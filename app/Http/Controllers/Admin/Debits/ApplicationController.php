<?php

namespace App\Http\Controllers\Admin\Debits;

use App\Http\Controllers\Controller;
use App\Models\Accounts\CurrentAccount;
use App\Models\Accounts\FixedDepositBalanceTransaction;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\GeneralAccount;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Members;
use App\Models\Accounts\MemberShareAccount;
use App\Models\Accounts\WithdrawApplication;
use App\Models\CurrentAccountDetails;
use App\Models\Primary\Area;
use App\Models\Savings;
use App\Models\SavingsBalance;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    function withdraw_index(Request $request){
        $areas = Area::all();
        if(auth()->user()->hasRole('admin|manager')){
            $withdraw_applications = WithdrawApplication::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                }
                if($request->area_id){
                    $q->whereIn('account_id', Members::query()->where('area_id',$request->area_id)->pluck('account'));
                }
            })
            ->latest()
            ->paginate(100);
        }

        if(auth()->user()->hasRole('field-officer')){
            $withdraw_applications = WithdrawApplication::query()
            ->where(function ($q) use ($request){
                if($request->search){
                    $q->where('account_id', $request->search)
                    ->orWhereIn('account_id', Members::query()->where('m_name', $request->search)->pluck('account'));
                }
            })->whereIn('account_id', Members::where('area_id', Auth::user()->staff->area)->pluck('account'))
            ->latest()
            ->paginate(100);
        }
        
        return view('Debits.loan_withdraw_application.index', compact('withdraw_applications', 'areas'));
    }

    function search(){


        return view('Debits.loan_withdraw_application.search');
    }

    //---search_post
    public function search_post(Request $request){
        $request->validate([
            'account_id'=>'required',
        ]);
        $member = Members::where('account', $request->account_id)->first();
       
        $type = $request->type;
        if(!$member){
            return back()->with(Toastr::warning('Member Account Not Found !', 'Error'));
        }

        if(!Auth::user()->hasRole('admin')){

            if(Auth::user()->staff->area != $member->area_id){
                return back()->with(Toastr::warning('You do not have access to this Member !', 'Error'));
            }
        }
        
        //general account
        if($request->type == 'general'){
            $account = GeneralAccount::where('account_id', $request->account_id)->with('generalAc')->first();
            $main_balance = $account?->generalAc()->sum('deposit') - $account?->generalAc()->sum('withdraw');

            if(empty($account)){
                return back()->with(Toastr::warning('General Account Not Found!', 'Error'));
            }
        }

        //current account
        elseif($request->type == 'current'){
            $account = CurrentAccountDetails::where('account_id', $request->account_id)->first();
            $main_balance = $account?->current_account()->sum('deposit_amount') - $account?->current_account()->sum('withdraw');

            if(empty($account)){
                return back()->with(Toastr::warning('Current Account Not Found!', 'Error'));
            }
        }

         //dps account
         elseif($request->type == 'dps'){
            $account = Savings::where('account_id', $request->account_id)->first();
            $main_balance = $account?->transactions()->sum('deposit') - $account?->transactions()->sum('withdraw');

            if(empty($account)){
                return back()->with(Toastr::warning('DPS Account Not Found!', 'Error'));
            }
        }

        //fdr account
        elseif($request->type == 'fdr'){
            $account = FixedDiposit::where('account', $request->account_id)->first();
            $main_balance = $account?->amount;

            if(empty($account)){
                return back()->with(Toastr::warning('Fixed Deposit Account Not Found!', 'Error'));
            }
        }
        //share account
        elseif($request->type == 'share'){
            $account = Members::where('account', $request->account_id)
            ->where('share', '!=', null)
            ->first();
            $main_balance = $account?->share;

            if(empty($account)){
                return back()->with(Toastr::warning('Share Account Not Found!', 'Error'));
            }
        }

        else{
            return back()->with(Toastr::warning('Account Not Found!', 'Error'));
        }

       
        return view('Debits.loan_withdraw_application.create',compact('account', 'main_balance', 'member', 'type'));
    }

    function withdraw_store(Request $request){
        // general account transaction cerate--
        if($request->account_type == 'general'){
            $transaction_id = GeneralAcTransactions::insertGetId([
                'date' => today(),
                'account' =>$request->account_id,
                'account' =>$request->account_id,
                'withdraw' =>$request->withdraw_amount,
                'note' =>$request->member_note,
                'created_at' => now(),
            ]);
        }

        // current account transaction cerate--
        if($request->account_type == 'current'){
            $transaction_id = CurrentAccount::insertGetId([
                'date' => today(),
                'account' =>$request->account_id,
                'withdraw' =>$request->withdraw_amount,
                'posted_by' =>auth()->user()->name,
                'created_at' => now(),
            ]);
        }

        // dps account transaction cerate--
        if($request->account_type == 'dps'){
             $transaction_id = SavingsBalance::insertGetId([
                 'code'=>uniqid(),
                 'date' => today(),
                 'savings_id' =>$request->id,
                 'withdraw' =>$request->withdraw_amount,
                 'note' =>$request->member_note,
                 'processed_by' =>auth()->user()->name,
                 'created_at' => now(),
             ]);
         }

         // dps account transaction cerate--
        if($request->account_type == 'fdr'){
            $transaction_id = FixedDepositBalanceTransaction::insertGetId([
                'fdr_id' => $request->id,
                'account_id' => $request->account_id,
                'type' =>2,
                'amount' =>$request->withdraw_amount,
                'processed_by' =>auth()->user()->name,
                'date' =>today(),
                'current_balance' =>$request->balance - $request->withdraw_amount,
                'new_profit_rate' =>$request->new_profit_rate,
                'previous_profit_rate' =>$request->previous_profit_rate,
                'previous_balance' =>$request->balance,
                'note' =>$request->member_note,
                'created_at' => now(),
            ]);
            if($transaction_id){
                $fixed_deposit = FixedDiposit::where('account', $request->account_id)->first();
                $fixed_deposit->update([
                    'amount' =>$fixed_deposit->amount - $request->withdraw_amount,
                ]);
            }
        }

        // share account transaction cerate--
        if($request->account_type == 'share'){
            // $request->all();
            $transaction_id = MemberShareAccount::insertGetId([
                'user_id'=>auth()->user()->id,
                'date' => today(),
                'account_number' =>$request->account_id,
                'amount' =>$request->withdraw_amount,
                'share'=>$request->withdraw_amount/100,
                'transaction_type'=>'Sale',
                'details'=>$request->member_note,
                'created_at'=>Carbon::now(),
            ]);

            if($transaction_id){
                $share_account = Members::where('account', $request->account_id)->first();
                $share_account->update([
                    'share' =>$share_account->share - $request->withdraw_amount,
                ]);
            }
        }
        
        WithdrawApplication::create([
            'account_id' => $request->account_id,
            'account_type' => $request->account_type,
            'expected_date' => $request->expected_date,
            'withdraw_amount' => $request->withdraw_amount,
            'member_note' => $request->member_note,
            'transaction_id' => $transaction_id,
            'process_by' =>auth()->user()->name,
        ]);

        

        return redirect()->route('loan.withdraw.index')->with(Toastr::success('Withdraw Application Request Success', 'Success'));
    }

    //withdraw_application_status_change
    public function withdraw_application_status_change($t_id, $status)
    {
        $withdraw_application = WithdrawApplication::findOrFail($t_id);
     
        $withdraw_application->update([
            'status'=>$status
        ]);
        return redirect()->route('loan.withdraw.index')->with(Toastr::success('Change Status', 'Success'));
    }

    //withdraw_status_rejected
    public function withdraw_status_rejected(Request $request)
    {
        $withdraw_application = WithdrawApplication::findOrFail($request->app_id);
        //general account transaction delete---
        if($withdraw_application->account_type == 'general'){
            GeneralAcTransactions::findOrFail($withdraw_application->transaction_id)->delete();
        }

        //current account transaction delete---
        if($withdraw_application->account_type == 'current'){
            CurrentAccount::findOrFail($withdraw_application->transaction_id)->delete();
        }

        //dps account transaction delete---
        if($withdraw_application->account_type == 'dps'){
            SavingsBalance::findOrFail($withdraw_application->transaction_id)->delete();
        }

        //fdr account transaction delete---
        if($withdraw_application->account_type == 'fdr'){
            $fdr_trans= FixedDepositBalanceTransaction::findOrFail($withdraw_application->transaction_id);
            $fdr = $fdr_trans->fdr_account;
            $fdr->update([
                'amount'=>$fdr->amount + $fdr_trans->amount,
                'percent'=>$fdr_trans->previous_profit_rate,
            ]);
            $fdr_trans->delete();
        }

        ////share account transaction delete---
        if($withdraw_application->account_type == 'share'){
            $share_trans= MemberShareAccount::findOrFail($withdraw_application->transaction_id);
            $share = $share_trans->member;
            $share->update([
                'share'=>$share->share + $share_trans->amount,
            ]);
            $share_trans->delete();
        }

        $withdraw_application->update([
            'rejected_note'=>$request->note,
            'status'=>$request->status,
        ]);
        return response()->noContent();
    }

    //withdraw application delete---
    public function withdraw_application_delete($app_id)
    {
        $withdraw_application = WithdrawApplication::findOrFail($app_id);
        if($withdraw_application->status == 0){
            if($withdraw_application->account_type == 'general'){
                $general_tran = GeneralAcTransactions::findOrFail($withdraw_application->transaction_id);
                $general_tran->delete();
            }

            if($withdraw_application->account_type == 'current'){
                $current_tran = CurrentAccount::findOrFail($withdraw_application->transaction_id);
                $current_tran->delete();
            }

            if($withdraw_application->account_type == 'dps'){
                SavingsBalance::findOrFail($withdraw_application->transaction_id)->delete();
            }

            if($withdraw_application->account_type == 'share'){
                $share_tran = MemberShareAccount::findOrFail($withdraw_application->transaction_id);
                $share = $share_tran->member;
                $share->update([
                    'share'=>$share->share + $share_tran->amount,
                ]);

                $share_tran->delete();
            }
            $withdraw_application->delete();
            return back()->with(Toastr::success('Withdraw Application Deleted Successfully !', 'success'));
        }
        return back()->with(Toastr::warning('Can Not Delete This Withdraw Application !', 'warning'));
    }
}
