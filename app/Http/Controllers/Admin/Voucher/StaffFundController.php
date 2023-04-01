<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Members;
use App\Models\Primary\Staffs;
use App\Models\StaffDepositPurpose;
use App\Models\StaffFund;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


class StaffFundController extends Controller
{


    public function index( Request $request)
    {
        $staffs = Staffs::query()->select('id', 'name')->get();


        $transactions = StaffFund::with(['staff', 'purpose', 'processor'])->when($request->get('staff_id'), function($query) use($request){
            return $query->where('staff_id', $request->get('staff_id'));
        })->latest()->get();
        return view('Primary.staff-fund-transactions.index', compact('transactions', 'staffs'));
    }

    public function show($id)
    {
        $staff = Staffs::with('staff_funds')->findOrFail($id);
      
        $deposit = StaffFund::where('staff_id', $staff->id)->where('type', 'deposit')->sum('amount');
        $withdraw = StaffFund::where('staff_id', $staff->id)->where('type', 'withdraw')->sum('amount');
        $balance = $deposit - $withdraw;
        return view('Primary.staff-fund-transactions.show', compact('staff', 'deposit', 'withdraw', 'balance'));
        

    }




    public function staff_deposit()
    {
        $staffs = Staffs::all();
        $purposes = StaffDepositPurpose::all();
        return view('voucher.staff-fund.deposit', compact('staffs', 'purposes'));
    }

    public function destroy($id)    
    {
        $transaction = StaffFund::findOrFail($id);
        $transaction->delete();
        return back()->with(Toastr::success('Transaction Deleted Successfully', 'Success'));
    }

    public function staff_deposit_store(Request $request)
    {
        $request->validate([
            'staff_id' => 'required',
            'member_id' => 'nullable',
            'amount' => 'required',
            'date' => 'nullable',
            'details' => 'nullable',
            'deposit_type' => 'required'
        ], [
            'staff_id.required' => 'Staff is required'
        ]);


        StaffFund::create([

            'staff_id' => $request->staff_id,
            'member_id' => $request->member_id?? null,
            'type' => 'deposit',
            'amount' => $request->amount,
            'date' => $request->date?? today(),
            'details' => $request->details,
            'deposit_type' => $request->deposit_type,
            'processed_by' =>auth()->user()->id

        ]);
        return back()->with(Toastr::success('Deposit Successfull', 'Success'));
    }



    public function staff_withdraw_store(Request $request)
    {

        $request->validate([
            'staff_id'=> 'required',
            'amount'=> 'required',
            'date'=> 'nullable',
            
        ]);


        $deposit = StaffFund::where('staff_id', $request->staff_id)->where('type', 'deposit')->sum('amount');
        $withdraw = StaffFund::where('staff_id', $request->staff_id)->where('type', 'withdraw')->sum('amount');
        $amount = $deposit - $withdraw;

        if($amount>= $request->amount){
            StaffFund::create([

                'staff_id' => $request->staff_id,
                'type' => 'withdraw',
                'amount' => $request->amount,
                'date' => $request->date?? today(),
                'processed_by' => auth()->user()->id
    
            ]);
            return back()->with(Toastr::success('Withdraw Successfull', 'Success'));
        }else{
            return back()->with(Toastr::error('Insufficient Balance', 'Error'));
        }
    }


    public function get_members_by_area(Request $request)
    {
        $input = $request->all();

        $staff = Staffs::find($input['staff_id']);
        $members = Members::where('area_id', $staff->area)->where('m_name', 'LIKE', '%' . $input['term']['term'] . '%')->get()->toArray();

        return response()->json($members);
    }

    public function get_staff_fund_amount(Request $request)
    {
   
        $deposit = StaffFund::where('staff_id', $request->staff_id)->where('type', 'deposit')->sum('amount');
        $withdraw = StaffFund::where('staff_id', $request->staff_id)->where('type', 'withdraw')->sum('amount');
        $amount = $deposit - $withdraw;
        return response()->json($amount);
    }


    public function staff_withdraw()
    {

        $staffs = Staffs::all();
        return view('voucher.staff-fund.withdraw', compact('staffs'));
    }
}


