<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\FixedDepositBalanceTransaction;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Members;
use App\Models\Accounts\MemberShareAccount;
use App\Models\CcLoanInstallment;
use App\Models\LoanInstallments;
use App\Models\Primary\Staffs;
use App\Models\SavingsBalance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserCollectionReportController extends Controller
{
    public function search()
    {

        $staffs = Staffs::all();
        return view('Reports.all_report.user_collection.search', compact('staffs'));
    }


    public function index(Request $request)
    {

        $collections = new Collection();

        if (!$request->type || $request->type == 'general') {

            $general_account_deposits = GeneralAcTransactions::query()
                ->whereNull('withdraw')
                ->where('date', '>=', $request->start_date)
                ->where('date', '<=', $request->end_date);

            $collections->push((object) [
                'type' => 'General Account Deposit',
                'amount' => $general_account_deposits->sum('deposit'),
                'penalty' => 0.00,
                'count' => $general_account_deposits->count(),
                'user' => 'All Users'
            ]);
        }

        if (!$request->type || $request->type == 'dps') {

            $dps_deposits = SavingsBalance::query()
                ->whereNull('withdraw')
                ->where('date', '>=', $request->start_date)
                ->where('date', '<=', $request->end_date);

            $collections->push((object) [
                'type' => 'DPS Deposits',
                'amount' => $dps_deposits->sum('deposit'),
                'penalty' => $dps_deposits->sum('penalty'),
                'count' => $dps_deposits->count(),
                'user' => 'All Users'
            ]);
        }


        if (!$request->type || $request->type == 'loan') {

            $loan_installments = LoanInstallments::query()
                ->where('date', '>=', $request->start_date)
                ->where('date', '<=', $request->end_date);

            $collections->push((object) [
                'type' => 'Loan Installments Collection',
                'amount' => $loan_installments->sum('amount'),
                'penalty' => $loan_installments->sum('penalty'),
                'count' => $loan_installments->count(),
                'user' => 'All Users'
            ]);
        }

        if (!$request->type || $request->type == 'fdr') {

            $fdr_deposits = FixedDepositBalanceTransaction::query()
                ->where('type', 1)
                ->where('date', '>=', $request->start_date)
                ->where('date', '<=', $request->end_date);

            $collections->push((object) [
                'type' => 'FDR Deposits',
                'amount' => $fdr_deposits->sum('amount'),
                'penalty' => 0.00,
                'count' => $fdr_deposits->count(),
                'user' => 'All Users'
            ]);
        }


        if (!$request->type || $request->type == 'cc_loan') {

            $cc_loan_installments = CcLoanInstallment::query()
                ->where('date', '>=', $request->start_date)
                ->where('date', '<=', $request->end_date);

            $collections->push((object) [
                'type' => 'CC Loan Installments',
                'amount' => $cc_loan_installments->sum('amount'),
                'penalty' => $cc_loan_installments->sum('penalty'),
                'count' => $cc_loan_installments->count(),
                'user' => 'All Users'
            ]);
        }




        $report['collections'] = $collections;
        $report['start_date'] = $request->start_date;
        $report['end_date'] = $request->end_date;
        $report['admitted']= Members::where('active', 1)->where('join', '>=', $request->start_date)->where('join', '<=', $request->end_date)->count();
        $report['deactivated']= Members::where('active', 0)->where('join', '>=', $request->start_date)->where('join', '<=', $request->end_date)->count();
        $report['total_member']= Members::count();
        $report['total_member']= Members::whereNotNull('share');




        return view('Reports.all_report.user_collection.index', compact('report'));
    }
}


