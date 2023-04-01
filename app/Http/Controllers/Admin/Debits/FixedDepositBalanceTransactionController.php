<?php

namespace App\Http\Controllers\Admin\Debits;

use App\Http\Controllers\Controller;
use App\Models\Accounts\FixedDepositBalanceTransaction;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\Members;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FixedDepositBalanceTransactionController extends Controller
{


    public function show($account)
    {

        $member = Members::where('account', $account)->first();
        if(!$member){
            return redirect()->back()->with(Toastr::error('Member Not Found!', 'Error!'));
        }
        $transactions = FixedDepositBalanceTransaction::where('account_id', $account)->with('member')->latest()->get();
        
        return view('Debits.fixed_deposit_balance_transaction.transaction', compact('transactions', 'member'));
    }


    public function search()
    {
        return view('Debits.fixed_deposit_balance_transaction.search');
    }


    public function postSearch(Request $request)
    {
        $fdr = FixedDiposit::where('account', $request->account)->first();

        if ($fdr) {
            return redirect()->route('fdr-balance-transaction.create', $request->account)->with(Toastr::info('Fdr Account Found', 'Success'));
        }

        return redirect()->back()->with(Toastr::error('Fdr Account Not Found', 'Error'));
    }


    public function create($account)
    {


        $fdr = FixedDiposit::where('account', $account)->first();

        if(!$fdr){
            return redirect()->back()->with(Toastr::error('Fdr Account Not Found', 'Error'));
        }

        return view('Debits.fixed_deposit_balance_transaction.create', compact('fdr'));
    }


    public function store(Request $request)
    {

        $request->validate([

            'type' => 'required|numeric',
            'amount' => 'required|numeric',
            'date' => 'nullable',
            'note' => 'nullable',
            'new_profit_rate' => 'required'
        ]);

        if($request->type == 2){
            if($request->amount > $request->current_balance){
                return redirect()->back()->with(Toastr::error('Insufficient Balance', 'Error!'));
            }
        }


        FixedDepositBalanceTransaction::create([
            'fdr_id' => $request->fdr_account_id,
            'account_id' => $request->account,
            'type' => $request->type,
            'amount' => $request->amount,
            'date' => $request->date ?? today(),
            'current_balance' => $request->type == 1? ($request->current_balance + $request->amount) : ($request->current_balance - $request->amount) ,
            'note' => $request->note,
            'new_profit_rate' => $request->new_profit_rate,
            'previous_profit_rate' => $request->previous_profit_rate,
            'previous_balance' => $request->current_balance,
            'processed_by' => Auth::user()->name
        ]);

        $fdr = FixedDiposit::find($request->fdr_account_id);

        if ($request->type == 1) {
            $fdr->update([
                'amount' => $fdr->amount + $request->amount,
                'percent' => $request->new_profit_rate
            ]);

            return redirect()->route('fdr-balance-transaction.search')->with(Toastr::success('Fdr Balance Deposit Successful', 'Success!'));
        } else {
            $fdr->update([
                'amount' => $fdr->amount - $request->amount,
                'percent' => $request->new_profit_rate
            ]);
            return redirect()->route('fdr-balance-transaction.search')->with(Toastr::success('Fdr Balance Withdraw Successful', 'Success!'));
        }
    }


    public function destroy($id)
    {
        
        $fdr_transaction =  FixedDepositBalanceTransaction::findOrFail($id);
        $fdr = $fdr_transaction->fdr_account;
        
        if ($fdr_transaction->type == 1) {
            $fdr->update([
                'amount' => $fdr->amount - $fdr_transaction->amount,
                'percent' => $fdr_transaction->previous_profit_rate
            ]);     
        } else {
           
            $fdr->update([
                'amount' => $fdr->amount + $fdr_transaction->amount,
                'percent' => $fdr_transaction->previous_profit_rate
            ]);
        }
        
        $fdr_transaction->delete();
        return redirect()->back()->with(Toastr::success('Transaction Deleted Successful', 'Success!'));
           

       
    }


    
}
