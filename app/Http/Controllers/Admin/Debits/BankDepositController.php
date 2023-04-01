<?php

namespace App\Http\Controllers\Admin\Debits;

use App\Http\Controllers\Controller;
use App\Models\Primary\BankList;
use App\Models\Primary\BankTransactionHistory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BankDepositController extends Controller
{
    public function create(){
        $banks = BankList::where('active', 1)->get();
        return view('Debits.bankDeposit.create',[
            'banks'=>$banks,
        ]);
    }

    //getBankAmount
    public function getBankAmount(Request $request){
        $bankAccount = BankList::find($request->account_id);
        return response()->json($bankAccount);
    }

    public function store(Request $request){
        $request->validate([
                'account_id' => 'required',
                'branch' => 'required',
                'amount' => 'required',
                'balance' => 'required',
                //'attachment' => 'required',
            ]);
        $banklist = BankList::find($request->account_id);
        $bank_amount = $banklist->balance + $request->amount;

        $attachment_name = null;
        if ($request->hasFile('attachment')) {
            $attachment = $request->attachment;
            $attachment_name = 'bankdeposit' . uniqid() . '.' . $attachment->extension();
            $request->attachment->storeAs('uploads/Bank/deposit', $attachment_name);
        }

         $bank_transaction_history = new BankTransactionHistory();
        $bank_transaction_history->bank_id = $request->account_id;
        $bank_transaction_history->branch = $request->branch;
        $bank_transaction_history->amount = $request->amount;
        $bank_transaction_history->bank_balance = $bank_amount;
        $bank_transaction_history->type = 'Deposit';
        $bank_transaction_history->attachment = $attachment_name;
        $bank_transaction_history->notes = $request->details ?? null;

        $bank_transaction_history->save();

        if($bank_transaction_history->save()){
            $banklist->update([
                'balance'=>$bank_amount
            ]);
        }
        return redirect()->route('bank.deposit')->with(Toastr::success('Bank Deposit successfully!', 'Success'));
    }
}
