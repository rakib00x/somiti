<?php

namespace App\Http\Controllers\Admin\Accounts;

use Illuminate\Http\Request;
use App\Models\Accounts\Members;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CheckStaffAccessByArea;
use App\Http\Traits\MobileSmsTrait;
use App\Models\Accounts\GeneralAccount;
use Illuminate\Support\Facades\Session;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Primary\Area;

class GeneralAcController extends Controller
{
    use CheckStaffAccessByArea;
    use MobileSmsTrait;

    //
    public function index(Request $request)
    {

        $areas = Area::all();
        if (Auth::user()->hasRole('admin|manager')) {
            $general_accounts = GeneralAccount::query()
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
            $general_accounts = GeneralAccount::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                }
            })->whereIn('account_id', Members::where('area_id', Auth::user()->staff->area)->pluck('account'))
            ->latest()
            ->paginate(100);
        }
        return view('Accounts.general-ac.index', compact('general_accounts', 'areas'));
    }


    //create_general_account
    public function create_general_account($id){
        $member = Members::find($id);
        $this->checkMemberAccess($member->account);
        return view('Accounts.general-ac.create',compact('member'));
    }

    public function search_account(){
        return view('Accounts.general-ac.search');
    }

    //post_general_search
    public function post_general_search(Request $request){
        $this->validate($request, ['account' => 'required',]);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();
        if (!$member) {
            return redirect()->back()->with(Toastr::error("Account not found! Please enter a valid account number.", "Error!"));
        }

        $member_check = GeneralAccount::where('account_id', $request->account)->first();
        if ($member_check == true) {
            return redirect()->back()->with(Toastr::warning('This account already have an open'));
        }

        return redirect()->route('general.create', $member->id);

    }

    //store_general_account
    public function store_general_account(Request $request, $id){
        $request->validate([
            'target_amount'=>'required',
        ]);
        $member = Members::find($id);
        
        $general_account = new GeneralAccount();
        $general_account->account_id = $request->account;
        $general_account->date = $request->date;
        $general_account->target_amount = $request->target_amount;
        $general_account->account_type = $request->account_type;
        $general_account->save();
                // dd($member->m_mobile);

       // sms section
         if ($general_account && $member->m_mobile) {
            $smsData = [
                'mobile' => $member->m_mobile,
                'account' => $general_account->account_id,
                'target_amount' => $request->target_amount,
                'date' => date('d-m-Y'),
            ];
            $this->newMemberSms("Congratulations! Your general account has been open successfully. Account Number:", $smsData);
        }
        return redirect()->route('general-ac.index')->with(Toastr::success('General Account Created Success'));
    }


    public function getSearchDeposit()
    {
        return view('Accounts.general-ac.search-deposit');
    }

    public function postSearchDeposit(Request $request)
    {
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error('Account could not found'));
        }

        return redirect()->route('general-ac.deposit', $request->account);
    }

    public function getSearchWithdraw()
    {
        return view('Accounts.general-ac.search-withdraw');
    }

    public function postSearchWithdraw(Request $request)
    {
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();

        if (!$member) {
            return redirect()->back()->with(Toastr::error('Account could not found'));
        }

        return redirect()->route('general-ac.withdraw', $request->account);
    }

    public function getDeposit($account)
    {
        Session::flash('goto_url', url()->previous());
        $generalac = GeneralAccount::where('account_id', $account)->first();

        $this->checkMemberAccessView($account);

        return view('Accounts.general-ac.deposit', compact('generalac'));
    }

    public function getWithdraw($account)
    {
        $member = Members::where('account', $account)->first();
        return view('Accounts.general-ac.withdraw', compact('member'));
    }

    public function postDeposit(Request $request, $account)
    {

        $this->validate($request, [
            'account'   => 'required',
            'date'      => 'required|date',
            'deposit'   => 'required|numeric',
            'note'      => 'nullable|string'
        ]);

        $this->checkMemberAccess($account);

        $generalAccount = new GeneralAcTransactions($request->all());
        $generalAccount->processed_by = Auth::user()->name;
        $generalAccount->save();

        $member = Members::where('account', $account)->first();
        if ($member->m_mobile) {
            $total = $member->ac_balance;
            $this->newGaDepositeSms($member->m_mobile, $member->account, $request->deposit, $request->date, $total);
        }

        return redirect()->route('general-ac.transactions', $account)->with(Toastr::success('Deposit posted successfully', 'Success!'));
    }

    public function postWithdraw(Request $request, $account)
    {
        $this->validate($request, [
            'account'   => 'required',
            'date'      => 'required|date',
            'withdraw'   => 'required|numeric',
            'note'      => 'nullable|string'
        ]);

        $this->checkMemberAccess($account);

        $generalAccount = new GeneralAcTransactions($request->all());
        $generalAccount->processed_by = Auth::user()->name;
        $generalAccount->save();

        $member = Members::where('account', $account)->first();
        if ($member->m_mobile) {
            $total = $member->ac_balance;
            $this->newGaWithdrawSms($member->m_mobile, $member->account, $request->withdraw, $request->date, $total);
        }
        return redirect()->route('general-ac.transactions', $account)->with(Toastr::success('Withdraw posted successfully', 'Success!'));
    }


    public function transactions($account)
    {
        $this->checkMemberAccess($account);

        $member = Members::where('account', $account)->first();

        return view('Accounts.general-ac.transactions', compact('member'));
    }

    public function transactionsDelete($id)
    {
        if (Auth()->user()->hasRole('admin|manager')) {
            GeneralAcTransactions::find($id)->delete();
            return redirect()->back()->with(Toastr::success("Transaction deleted successfully!", "Success"));
        }
        abort(404);
    }

    //edit
    public function edit($account_id)
    {
        $gneralAc = GeneralAccount::where('account_id', $account_id)->first();
        return view('Accounts.general-ac.edit', compact('gneralAc'));
    }

    //update
    public function update(Request $request)
    {
        $gneralAc = GeneralAccount::where('account_id', $request->account_id)->first();
        $gneralAc->update([
            'target_amount'=>$request->target_amount,
        ]);
        return redirect()->route('general-ac.index')->with(Toastr::success("General Account Updated Successfully !", "Success"));
    }
}
