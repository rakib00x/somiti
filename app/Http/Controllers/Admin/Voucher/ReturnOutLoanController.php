<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use App\Models\Primary\Outloan;
use App\Models\Primary\OutLoanHistory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReturnOutLoanController extends Controller
{
    public function create(){
        $outLoanlist = Outloan::where('active', 1)->get();
        return view('voucher.returnoutloan.create', compact('outLoanlist'));
    }

    public function store(Request $request){
        $request->all();
        $request->validate([
            'out_loan'=>'required',
            'branch'=>'required',
            // 'balance'=>'required',
            'amount'=>'required',
            'out_loan_percent'=>'required',
            'interest'=>'required',
        ]);
         $amount = $request->amount;
         $current_balance = OutLoanHistory::where('outloan_id', $request->out_loan)->latest()->first() ?? '0';
         $total_balance = ($current_balance->current_balance ?? '0') - $amount;

         if($request->amount > $request->balance){
            return back()->with(Toastr::warning('Your Current Balance Is Very Low', 'Success'));
         }
         else{
            $attachment_name = null;
            if ($request->hasFile('attachment')) {
                $attachment = $request->attachment;
                $attachment_name = 'returnoutloan' . uniqid() . '.' . $attachment->extension();
                $request->attachment->storeAs('uploads/outloan/returnoutloan', $attachment_name);
            }

            $getoutloan = new OutLoanHistory();
            $getoutloan->outloan_id = $request->out_loan;
            $getoutloan->branch = $request->branch;
            $getoutloan->amount = $request->amount;
            $getoutloan->type = 'returnoutloan';
            $getoutloan->current_balance = $total_balance;
            $getoutloan->details = $request->details;
            $getoutloan->attachment = $attachment_name;
            $getoutloan->out_loan_percent = $request->out_loan_percent;
            $getoutloan->interest = $request->interest;
            $getoutloan->save();

            return redirect()->route('returnoutloan.create')->with(Toastr::success('Return OutLoan success!', 'Success'));
        }
    }
}
