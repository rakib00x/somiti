<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Helpers\CheckStaffAccessByArea;
use App\Http\Controllers\Controller;
use App\Models\Accounts\CurrentAccount;
use App\Models\Accounts\Members;
use App\Models\CurrentAccountDetails;
use App\Models\Primary\Area;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\MobileSmsTrait;


class CurrentAccountController extends Controller
{
    use CheckStaffAccessByArea;
    use MobileSmsTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $areas = Area::all();
        if(Auth()->user()->hasRole('admin|manager')){
            $current_accounts = CurrentAccountDetails::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', 'like', '%'.$request->search.'%')->pluck('account'));
                }
                if($request->area_id){
                    $q->whereIn('account_id', Members::query()->where('area_id', $request->area_id)->pluck('account'));
                }
            })
            ->latest()
            ->paginate(100);
        }
         else {
           
            $current_accounts = CurrentAccountDetails::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', 'like', '%'.$value.'%')->pluck('account'));
                }
                
            })->whereIn('account_id', Members::where('area_id', Auth::user()->staff->area)->pluck('account'))
            ->latest()
            ->paginate(100);
        }

        return view('Accounts.CurrentAccout.index', compact('current_accounts', 'areas'));
    }

     //current_account_search
     public function current_account_search(){
        return view('Accounts.CurrentAccout.current_search');
     }
     //current_account_search_post
     public function current_account_search_post(Request $request){
        $this->validate($request, ['account' => 'required',]);

        $this->checkMemberAccess($request->account);

        $member = Members::where('account', $request->account)->first();
        if (!$member) {
            return redirect()->back()->with(Toastr::error("Account not found! Please enter a valid account number.", "Error!"));
        }

        $member_check = CurrentAccountDetails::where('account_id', $request->account)->first();
        if ($member_check == true) {
            return redirect()->back()->with(Toastr::warning('This account already have an open'));
        }

        return redirect()->route('currentaccount.create',$member->id);
     }
     //current_account_create 
     public function current_account_create($id){
        $member = Members::find($id);
        $this->checkMemberAccess($member->account);
        return view('Accounts.CurrentAccout.currentac_create',compact('member'));
     }

    //  //current_account_store
    //  public function current_account_store(Request $request, $id)
    //  {
    //      dd($request->all());
    //     $request->validate([
    //         'target_amount'=>'required',
    //     ]);
        
    //     $member = Members::find($id);
    //     $current_accounts = new CurrentAccountDetails();

    //     $current_accounts->account_id = $request->account;
    //     $current_accounts->date = $request->date;
    //     $current_accounts->amount = $request->target_amount;

    //     $current_accounts->save();
        
    //      // sms section
    //      if ($current_accounts && $member->m_mobile) {
             
    //         $smsData = [
    //             'mobile' => $current_accounts->m_mobile,
    //             'account' => $current_accounts->account_id,
    //             'password' => $request->password,
    //             'date' => date('d-m-Y'),
    //         ];
    //         $this->newMemberSms($smsData);
    //     }
    
    //     return redirect()->route('current-account.index')->with(Toastr::success('Current Account Created Success'));
    //  }
     public function current_account_store(Request $request, $id) {

    $request->validate([
        'target_amount'=>'required',
    ]);

    $member = Members::find($id);
    $current_accounts = new CurrentAccountDetails();

    $current_accounts->account_id = $request->account;
    $current_accounts->date = $request->date;
    $current_accounts->amount = $request->target_amount;

    $current_accounts->save();
    if ($current_accounts && $member->m_mobile) {
        $smsData = [
            'mobile' => $member->m_mobile,
            'account' => $member->account_id,
            'target_amount' => $request->target_amount,
            'date' => date('d-m-Y'),
        ];
        $this->newMemberSms("Congratulations! Your current account has been open successfully. Account Number:", $smsData);
    }
    return redirect()->route('current-account.index')->with(Toastr::success('Current Account Created Success'));
 }



    public function create()
    {

    }

    public function getSearch()
    {
        return view('Accounts.CurrentAccout.search');
    }

    public function useAccount($account)
    {
        $this->checkMemberAccess($account);

        $CurrentAccount = CurrentAccountDetails::where('account_id',$account)->first();

        return view('Accounts.CurrentAccout.create', compact('CurrentAccount'));
    }

    public function getAccount(Request $request)
    {
        $this->validate($request, ['account' => 'required']);

        $this->checkMemberAccess($request->account);

        $current_account = DB::table('current_account_details')->select(['account_id'])->where('account_id', $request->account)->first();

        if (!$current_account) {
            return redirect()->back()->with(Toastr::warning('Current account Not found', 'Warning!'));
        }

        return redirect()->route('current-account.use', [$current_account->account_id])->with(Toastr::info('Current Account Number Found!', 'Found'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'date' => 'required',
            'account' => 'required|numeric',
            'deposit_amount' => 'numeric',
            'withdraw' => 'nullable',
        ]);

        $this->checkMemberAccess($request->account);

        $new_ca = new CurrentAccount();

        $new_ca->date = $request->date;
        $new_ca->account = $request->account;
        $new_ca->deposit_amount = $request->deposit_amount;
        $new_ca->posted_by = Auth::user()->name;
        $new_ca->save();

        // if($new_ca->save()){
        //    $current_account = CurrentAccountDetails::where('account_id', $request->account)->first();
        //    $current_account->update([
        //       'amount'=>$current_account->amount + $request->deposit_amount,
        //    ]);
        // }
        return redirect()->route('current-amount.transaction',$request->account)->with(Toastr::success('Deposit to Current Account Success', 'Success!'));

        // return $request->session()->all();
        $urlToGo = $request->session()->get('goto_url', route('current-account.index'));
        Session::forget('goto_url');

        return redirect()->to($urlToGo)->with(Toastr::success('Current Account is running from now!', 'Success'));
        // return redirect()->route('current-account.index')->with(Toastr::success('Current Account is running from now!', 'Success'));
    }

    //current_account_edit
    public function current_account_edit($account_id)
    {
        $currentAc = CurrentAccountDetails::where('account_id', $account_id)->first();
        return view('Accounts.CurrentAccout.edit', compact('currentAc'));
    }

    //current_account_update
    public function current_account_update(Request $request)
    {
        $currentAc = CurrentAccountDetails::where('account_id', $request->account_id)->first();
        $currentAc->update([
            'amount'=>$request->target_amount,
        ]);
        return redirect()->route('current-account.index')->with(Toastr::success("Current Account Updated Successfully !", "Success"));
    }

    public function withdrawRoute($id)
    {
       // $member = Members::where('account', $id)->first();
        $current_account = CurrentAccountDetails::where('account_id', $id)->first();

        $this->checkMemberAccessView($current_account->account_id);

        return view('Accounts.CurrentAccout.withdraw', compact('current_account'));
    }

    public function withdraw(Request $request, $account)
    {

        $this->checkMemberAccess($account);

        $total_amount = CurrentAccountDetails::where('account_id', $account)->first()->total_current_balance;

        if ($total_amount < $request->withdraw) {
            return redirect()->back()->with(Toastr::warning('You have not enough balance to wihtdraw!', 'Warning'));
        }
        $withdraw = new CurrentAccount();
        $withdraw->date = now();
        $withdraw->account = $request->account;
        $withdraw->deposit_amount = null;
        $withdraw->withdraw = $request->withdraw;
        $withdraw->status = 0;
        $withdraw->posted_by = Auth::user()->name;
        $withdraw->save();

        // if($withdraw->save()){
        //     $current_account = CurrentAccountDetails::where('account_id', $request->account)->first();
        //     $current_account->update([
        //        'amount'=>$current_account->amount - $request->withdraw,
        //     ]);
        //  }

        return redirect()->route('current-amount.transaction',$account)->with(Toastr::info('Your withdrawal request successfully complete!', 'Info'));
    }

    //transaction
    public function transaction($account){
        $current_account = CurrentAccountDetails::where('account_id', $account)->first();
        $current_account_transactions = CurrentAccount::where('account', $account)
        ->latest()
        ->paginate(100);
        return view('Accounts.CurrentAccout.transaction', compact('current_account_transactions', 'current_account'));
    }

    //current_transaction_delete 
    public function current_transaction_delete($id){
        $current_account_transaction = CurrentAccount::where('id', $id)->first();
        $current_account_transaction->delete();
        return redirect()->back()->with(Toastr::success('Current Account Transaction deleted!', 'Deleted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cd = CurrentAccount::find($id);

        $this->checkMemberAccess($cd->account);

        $cd->delete();
        return redirect()->back()->with(Toastr::success('Account deleted!', 'Deleted'));
    }
}
