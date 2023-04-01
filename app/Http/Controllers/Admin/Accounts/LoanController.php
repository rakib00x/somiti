<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Http\Traits\MobileSmsTrait;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Loan;
use App\Models\Accounts\Members;
use App\Models\LoanInstallments;
use App\Models\Primary\Area;
use App\Models\Primary\LoanCategory;
use App\Rules\ReferrarAcRules;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoanController extends Controller
{

    use CheckStaffAccessByArea;
    use MobileSmsTrait;

    public function index(Request $request)
    {
        $areas = Area::all();
        if (Auth::user()->hasRole('admin')) {
            $loans = Loan::query()
                ->where(function ($q) use ($request) {
                    if ($request->search) {
                        $q->where('account_id', $request->search)
                            ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                    }
                    if ($request->area_id) {
                        $q->whereIn('account_id', Members::query()->where('area_id', $request->area_id)->pluck('account'));
                    }
                })
                ->latest()
                ->paginate(100);
        } else {
            $loans = Loan::query()
                ->where(function ($q) use ($request) {
                    if ($request->search) {
                        $q->where('account_id', $request->search)
                            ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                    }
                })->whereIn('account_id', Members::where('area_id', Auth::user()->staff->area)->pluck('account'))
                ->latest()
                ->paginate(100);
        }

        return view('Accounts.Loan.index', compact('loans', 'areas'));
    }

    //search memebrs
    public function search()
    {
        return view('Accounts.Loan.search');
    }

    public function postSearch(Request $request)
    {
        $this->validate($request, ['account' => 'required',]);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();
        // $member_check = Loan::where('account_id', $request->account)->count();
        if (!$member) {
            return redirect()->back()->with(Toastr::error("Account not found! Please enter a valid account number.", "Error!"));
        }

        $member_check = Loan::whereIn('status', [1, 2])->where('account_id', $request->account)->count();
        if ($member_check >= 4) {
            return redirect()->back()->with(Toastr::warning('This account already have four pending/running loans.', 'Warning'));
        }

        return redirect()->route('loan.create', $member->id);
    }

    public function create($id)
    {
        $member = Members::find($id);
        $this->checkMemberAccess($member->account);

        $loanCategories = LoanCategory::orderBy('id')->get();
        return view('Accounts.Loan.create', compact('member', 'loanCategories'));
    }

    public function store(Request $request)
    {
        // return $request->all();

        $this->checkMemberAccess($request->account_id);


        $this->validate($request, [
            'date'          => 'required|date',
            'expire_date'   => 'required|date',
            'scheme'        => 'required',
            'loan_amount'   => 'required|numeric',
            'percent'       => 'required|numeric',
            'installment'   => 'required|integer',
            'collection_start' => 'required|integer',
            'category_id'   => 'required|integer',
            'reference_acc' => ['nullable', 'integer', new ReferrarAcRules($request->account_id)],
            'alt_reference_acc' => 'nullable|integer'
        ]);



        $deposit = GeneralAcTransactions::where('account', $request->account_id)->sum('deposit');
        $withdraw = GeneralAcTransactions::where('account', $request->account_id)->sum('withdraw');
        $total_balance = $deposit - $withdraw;
        $ten_parcent = $request->loan_amount * 10 / 100;

        // if ($ten_parcent > $total_balance) {
        //     return redirect()->back()->with(Toastr::warning("You don't have enough balance in you general account.", "Warning"));
        // }

        $check_loan = Loan::whereIn('status', [1, 2])->where('account_id', $request->account_id)->where('category_id', $request->category_id)->get();



        if ($check_loan->count() > 0) {
            return redirect()->back()->with(Toastr::error("This member already has a loan of this category", "Error"));
        }

        $loan = new Loan($request->except(['expire_date', 'installment_amount']));
        $loan->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $loan->status = 1;
        $loan->processed_by = Auth::user()->name;
        $loan->save();

        // sms
        $member = Members::where('account', $request->account_id)->first();
        if ($member && $member->m_mobile) {
            $this->newLoanSms($member->m_mobile, $member->account, $request->loan_amount, $request->scheme, $request->installment_amount, $request->installment,);
        }

        return redirect()->route('loan.index')->with(Toastr::success("Loan initiated successfully", "Success"));
    }



    public function update_loan_status(Request $request)
    {
        $loan = Loan::findOrFail($request->loan_id);
        $loan->update([
            'status' => $request->status,
            'approved_by' => Auth::user()->name
        ]);

        return redirect()->route('loan.index')->with(Toastr::success("Loan status updated successfully", "Success"));
    }

    public function show($id)
    {
        $loan = Loan::find($id);

        $this->checkMemberAccess($loan->account_id);

        return view('Accounts.Loan.show', compact('loan'));
    }

    public function delete($id)
    {
        $loan = Loan::find($id);

        $this->checkMemberAccess($loan->account_id);

        $loan->deleted_by = Auth::user()->name;
        $loan->save();
        $loan->delete();

        return redirect()->route('loan.index')->with(Toastr::success("Loan deleted successfully", "Success"));
    }

    public function collectIndex()
    {
        Session::forget('goto_url');
        return view('Accounts.Loan.collect.index');
    }

    public function postCollectSearch(Request $request)
    {

        $request->validate(['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error("Account not found! Please enter a valid account number.", "Error!"));
        }

        $loans = Loan::where('account_id', $request->account)->get();

        // return count($loans);

        if (!count($loans)) {
            return redirect()->back()->with(Toastr::error("No loan found under the member account.", "Error!"));
        }

        return redirect()->route('loan.collect.loan_list', $request->account);
    }
    public function getCollectSearch($account)
    {

        $this->checkMemberAccessView($account);

        $member = Members::where('account', $account)->first();

        return view('Accounts.Loan.collect.loan_list', compact('member'));
    }

    public function createInstallment($loanId)
    {
        $loan = Loan::find($loanId);

        $this->checkMemberAccessView($loan->account_id);

        return view('Accounts.Loan.collect.create', compact('loan'));
    }

    public function storeInstallment(Request $request, $loanId)
    {
        // return $request->all();
        $request->validate([
            'loan_id' => 'required',
            'date' => 'required|date',
            'amount' => 'required|integer',
            'note' => 'nullable',
            'penalty' => 'nullable'
        ]);



        $install = new LoanInstallments();

        $install->loan_id = $request->loan_id;
        $install->amount = $request->installment_principal;
        $install->processed_by = Auth::user()->name;
        $install->loan()->update(['status' => 2]);
        $install->installment_no = LoanInstallments::where('loan_id', $loanId)->max('installment_no') + 1;
        $install->save();

        $urlToGo = $request->session()->get('goto_url', route('loan.show', $request->loan_id));
        Session::forget('goto_url');

        // sms
        $loan = Loan::find($loanId);
        $member = Members::where('account', $loan->account_id)->first();
        if ($member && $member->m_mobile) {
            $total = $loan->total_paid;
            $due = $loan->due_amount;
            $this->newLoanPaySms($member->m_mobile, $member->account, $request->amount, $request->date, $total, $due);
        }
        return redirect()->route('loan.show', $request->loan_id)->with(Toastr::success("Installment collection saved successfully!", "Success"));
    }

    public function deleteInstallment($id)
    {
        if (Auth()->user()->hasRole('admin|manager')) {
            LoanInstallments::find($id)->delete();
            return redirect()->back()->with(Toastr::success("Installment deleted successfully!", "Success"));
        }
        abort(404);
    }
}
