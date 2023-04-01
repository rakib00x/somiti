<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Members;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DebitCreditReportController extends Controller
{
    public function search()
    {
        return view('Reports.all_report.debit_credit.search');
    }

    public function index(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $type =$request->type;

        $member = Members::where('account',$request->account)->first();

        if($request->type == 'cash_in'){
            $general_account_transactions = GeneralAcTransactions::query()
            ->where('account', $request->account)
            ->whereNull('withdraw')
            ->where('created_at', '<=', $end_date)
            ->where('created_at', '>=', $start_date)
            ->get();



            $dps_account_transactions = $member->dps_trans()
                                        ->whereNull('withdraw')
                                        ->where('savings_balances.created_at', '<=', Carbon::parse($end_date))
                                        ->where('savings_balances.created_at', '>=', Carbon::parse($start_date))
                                        ->get();
        }else{
            $general_account_transactions = GeneralAcTransactions::query()
            ->where('account', $request->account)
            ->whereNull('deposit')
            ->where('created_at', '<=', $end_date)
            ->where('created_at', '>=', $start_date)
            ->get();

            $dps_account_transactions = $member->dps_trans()
                                        ->whereNull('deposit')
                                        ->where('savings_balances.created_at', '<=', $end_date)
                                        ->where('savings_balances.created_at', '>=', $start_date)
                                        ->get();



        }


        return view('Reports.all_report.debit_credit.index',compact('type','start_date','end_date','general_account_transactions', 'dps_account_transactions', 'member'));
    }
}
