<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Models\Accounts\CcLoan;
use App\Models\Accounts\CcLoanCategory;
use App\Models\Accounts\CcLoanClosing;
use App\Models\Accounts\Members;
use App\Models\CcLoanInstallment;
use App\Models\Primary\Area;
use App\Models\Primary\LoanCategory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CcLoanController extends Controller
{

    use CheckStaffAccessByArea;
    public function index(Request $request)
    {
        $areas = Area::all();
        if (Auth::user()->hasRole('admin|manager')) {
            $cc_loans = CcLoan::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                }
                if($request->area_id){
                    $q->whereIn('account_id', Members::query()->where('area_id', $request->area_id)->pluck('account'));
                }
            })
            ->latest()
            ->paginate(100);
        }
        if (Auth::user()->hasRole('field-officer')) {

            // return response()->json();
            $cc_loans = CcLoan::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                }
            })->whereIn('account_id', Members::where('area_id', Auth::user()->staff->area)->pluck('account'))
            ->latest()
            ->paginate(100);
        }


        return view('Accounts.CC_Loan.index', compact('cc_loans', 'areas'));
    }

    public function search()
    {
        return view('Accounts.CC_Loan.search');
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


        return redirect()->route('cc_loan.create', $member->id);
    }


    public function create($id)
    {

        $member = Members::find($id);
        $this->checkMemberAccess($member->account);
        $loanCategories = CcLoanCategory::orderBy('id')->get();
        return view('Accounts.CC_Loan.create', compact('member','loanCategories'));
    }


    public function store(Request $request) 
    {

        $this->checkMemberAccess($request->account_id);
        $request->validate([
            'account_id' => 'required',
            'date' => 'nullable',
            'loan_amount' => 'required',
            'installment_sequence' => 'nullable',
            'details' => 'nullable',
            'stamp_fee' => 'nullable',
            'category_id' => 'nullable',
            'start_date' => 'nullable',
            'expire_date' => 'nullable',
            'profit_rate' => 'required',
            'profit_amount' => 'required',
            'installment_amount' => 'required',
            'panalty_amount' => 'nullable',
            'attachment' => 'nullable|mimes:png,jpg',
            'processing_fee' => 'nullable',
            'admission_fee' => 'nullable',
            'insurance_fee' => 'nullable',
            'type' => 'required'
        ]);


        $loanExists = CcLoan::where('account_id', $request->account_id)->where('category_id', $request->category_id)->whereIn('status', [1,2])->first();


        if($loanExists){
            return redirect()->back()->with(Toastr::error('This member already has an active loan of this category'));
        }


        $file = $request->file('attachment');

        $file_name = '';
        $file_path = '';
        if($file){
            $file_name = date('YmdHis').'-cc-loan-attachment'.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/cc_loan'),$file_name);
            $file_path = 'images/cc_loan/'.$file_name;
        }



        CcLoan::create([
            'account_id' => $request->account_id,
            'date' => $request->date,
            'loan_amount' => $request->loan_amount,
            'opening_balance' => $request->loan_amount,
            'installment_sequence' => $request->installment_sequence,
            'details' => $request->details,
            'stamp_fee' => $request->stamp_fee,
            'category_id' => $request->category_id,
            'start_date' => $request->start_date,
            'expire_date' => $request->expire_date,
            'profit_rate' => $request->profit_rate,
            'profit_amount' => $request->profit_amount,
            'installment_amount' => $request->installment_amount,
            'panalty_amount' => $request->panalty_amount,
            'attachment' => $file_path,
            'processing_fee' => $request->processing_fee,
            'admission_fee' => $request->admission_fee,
            'insurance_fee' => $request->insurance_fee,
            'status' => 2,
            'processed_by' => Auth::user()->name,
            'profit_updated_at'=> today(),
            'total_profit_generated' => $request->profit_amount,
            'type' => $request->type
            
        ]);

        return redirect()->route('cc_loan.index')->with(Toastr::success('Loan Account Created Successfully!', 'Success'));
    }

    public function transaction_show($loan_id)
    {
        $cc_loan = CcLoan::with('installments')->where('id', $loan_id)->first();
        return view('Accounts.CC_Loan.transaction_show',compact('cc_loan') );
    }


    public function transaction_report($loan_id)
    {
        $cc_loan = CcLoan::with('installments', 'member')->where('id', $loan_id)->first();
       return view('Accounts.CC_Loan.transaction_report', compact('cc_loan'));
    }


    public function delete($id)
    {
        $loan = CcLoan::find($id);

        $this->checkMemberAccess($loan->account_id);

        if(is_file(public_path($loan->attachment))){
            unlink(public_path($loan->attachment));
        }

        $loan->delete();

        return redirect()->route('cc_loan.index')->with(Toastr::success("Loan deleted successfully", "Success"));
    }



    public function installment_search()
    {
        return view('Accounts.CC_Loan.collect.search');
    }

    public function installment_post_search(Request $request)
    {
        $request->validate(['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error("Account not found! Please enter a valid account number.", "Error!"));
        }

        $cc_loans = CcLoan::where('account_id', $request->account)->where('status', 2)->get();

        // return count($cc_loans);

        if (!count($cc_loans)) {
            return redirect()->back()->with(Toastr::error("No loan found under the member account.", "Error!"));
        }

        return redirect()->route('ccinst.collection.index', $request->account);
    }

    public function installment_index($account)
    {

        $this->checkMemberAccessView($account);

        $cc_loans = CcLoan::with('member')->where('account_id', $account)->whereIn('status', [1,2])->where('type', 2)->latest()->get();
    
        return view('Accounts.CC_Loan.collect.index', compact('cc_loans' ));
    }

    public function installment_create($account, $loan_id)
    {

        $this->checkMemberAccessView($account);
        $member = Members::where('account', $account)->first();
        $cc_loan = CcLoan::findOrFail($loan_id);
        $profit_generated_at = Carbon::parse($cc_loan->profit_updated_at);
        $current_date = Carbon::now()->format('Y-m-d');
        $months_passed = $profit_generated_at->diffInMonths($current_date);
        return view('Accounts.CC_Loan.collect.create', compact('member', 'months_passed', 'cc_loan'));
    }

    public function installment_store(Request $request)
    {

        $this->checkMemberAccess($request->account_id);
        $request->validate([
            'date' => 'nullable',
            'todays_profit' => 'required',
            'penalty' => 'nullable',
            'main_balance_return' => 'nullable|numeric',
        ]);


        CcLoanInstallment::create([
            'date' => $request->date?? today(),
            'cc_loan_id' => $request->cc_loan_id,
            'installment_no' => CcLoanInstallment::where('cc_loan_id', $request->cc_loan_id)->max('installment_no') + 1,
            'amount' => $request->todays_profit,
            'penalty' => $request->penalty,
            'main_balance_return' => $request->main_balance_return,
            'previous_profit' => $request->profit_due,
            'profit_balance' => $request->profit_due - $request->todays_profit,
            'main_balance' => $request->main_balance - $request->main_balance_return,
            'processed_by' => Auth::user()->name
        ]);

        $cc_loan = CcLoan::find($request->cc_loan_id);

        $cc_loan->decrement('installment_amount', $request->todays_profit);
     
        if($request->main_balance_return){
            $cc_loan->decrement('loan_amount', $request->main_balance_return);
        }

        
        return redirect()->route('cc_loan.transaction.show', $request->cc_loan_id)->with(Toastr::success("Installment Paid Successfully", "Success!"));
        
    }


    public function installment_destroy($id)
    {

       $installment = CcLoanInstallment::find($id);
        $cc_loan_id = $installment->cc_loan->id;
        $cc_loan = CcLoan::find($cc_loan_id);

        $cc_loan->increment('installment_amount', (float)$installment->amount);
        $cc_loan->increment('loan_amount', (float)$installment->main_balance_return);

        $installment->delete();
       return redirect()->route('ccinst.collection.index', $cc_loan->member->account)->with(Toastr::success("Installment Deleted Successfully", "Success!"));
    }


    public function closing_search()
    {
        return view('Accounts.CC_Loan.closing.search');
    }


    public function closing_post_search(Request $request)
    {
        $request->validate(['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error("Account not found! Please enter a valid account number.", "Error!"));
        }

        $cc_loans = CcLoan::where('account_id', $request->account)->where('status', 2)->get();


        if (!count($cc_loans)) {
            return redirect()->back()->with(Toastr::error("No loan found under the member account.", "Error!"));
        }

        return redirect()->route('cc_closing.index', $request->account);
    }

    
    public function closing_index($account)
    {

        $this->checkMemberAccessView($account);

        $member = Members::where('account', $account)->first();
        return view('Accounts.CC_Loan.closing.index', compact('member'));
    }

    public function closing_create($account, $loan_id)
    {
        $this->checkMemberAccess($account);
        $member = Members::where('account', $account)->first();
        $cc_loan = CcLoan::findOrFail($loan_id);
        $profit_generated_at = Carbon::parse($cc_loan->profit_updated_at);
        $current_date = Carbon::now()->format('Y-m-d');
        $months_passed = $profit_generated_at->diffInMonths($current_date);
        return view('Accounts.CC_Loan.closing.create', compact('member', 'months_passed', 'cc_loan'));
    }

    public function closing_store(Request $request)
    {


        $this->checkMemberAccessView($request->account_id);
        $request->validate([
            'closing_date'=> 'nullable',
            'fine'=> 'nullable',
            'total_return'=> 'required',
            'discount'=> 'nullable',
            'note'=> 'nullable',
        ]);

        CcLoanClosing::create([
            'cc_loan_id' => $request->cc_loan_id,
            'closing_date' => $request->closing_date,
            'fine' => $request->fine,
            'total_return' => $request->total_return,
            'discount' => $request->discount,
            'note' => $request->note,
            'processed_by' => Auth::user()->name,
            
        ]);

        CcLoan::find($request->cc_loan_id)->update([
            'status' => 3
        ]);

        return redirect()->route('cc_closing.index', $request->account_id); 
    }

}
