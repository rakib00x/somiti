<?php

namespace App\Http\Controllers\Admin\credits;

use App\Http\Controllers\Controller;
use App\Models\Primary\BankList;
use App\Models\Primary\BankTransactionHistory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BankWithdrawController extends Controller
{
    public function create(){
        $banks = BankList::where('active', 1)->get();
        return view('credits.bankwithdraw.create',[
            'banks'=>$banks,
        ]);
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
        $bank_amount = $banklist->balance - $request->amount;

        if($request->amount > $request->balance){
           return back()->with(Toastr::warning('Your Bank Amount Is Very Low', 'Success'));
        }
        else{
            $attachment_name = null;
            if ($request->hasFile('attachment')) {
                $attachment = $request->attachment;
                $attachment_name = 'bankwithdraw' . uniqid() . '.' . $attachment->extension();
                $request->attachment->storeAs('uploads/Bank/withdraw', $attachment_name);
            }

            $bank_transaction_history = new BankTransactionHistory();
            $bank_transaction_history->bank_id = $request->account_id;
            $bank_transaction_history->branch = $request->branch;
            $bank_transaction_history->amount = $request->amount;
            $bank_transaction_history->bank_balance = $bank_amount;
            $bank_transaction_history->type = 'Withdraw';
            $bank_transaction_history->attachment = $attachment_name;
            $bank_transaction_history->notes = $request->details ?? null;

            $bank_transaction_history->save();

            if($bank_transaction_history->save()){
                $banklist->update([
                    'balance'=>$bank_amount
                ]);
            }
            return redirect()->route('bank.withdraw')->with(Toastr::success('Bank Withdraw successfully!', 'Success'));
        }
    }
}
