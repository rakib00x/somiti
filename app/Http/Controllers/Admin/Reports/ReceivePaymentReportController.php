<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\Accounts\FixedDepositBalanceTransaction;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Primary\BranchList;
use App\Models\Primary\DirectorList;
use App\Models\Primary\DirectorTransactionHistory;
use App\Models\Primary\VoucherCategory;
use App\Models\SavingsBalance;
use Illuminate\Http\Request;

class ReceivePaymentReportController extends Controller
{
    public function search()
    {
        $branches = BranchList::all();
        return view('Reports.all_report.receive_payment_report.search', compact('branches'));
    }

    public function index(Request $request)
    {

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $reports['start_date'] = $start_date;
        $reports['end_date'] = $end_date;

        //opening balance calculation
        $director_balance = DirectorList::where('active', 1)->sum('balance');
        $director_deposit = DirectorTransactionHistory::when($request->branch_id, function ($query) use ($request) {
            $query->where('branch', $request->branch_id);
        })->where('type', 'Deposit')
            ->where('created_at', '<=', $end_date)
            ->sum('amount');

        $director_withdraw = DirectorTransactionHistory::when($request->branch_id, function ($query) use ($request) {
            $query->where('branch', $request->branch_id);
        })->where('type', 'Withdraw')
            ->where('created_at', '<=', $end_date)
            ->sum('amount');


        $opening_balance = sprintf("%.2f", $director_balance + $director_deposit - $director_withdraw);
        $reports['opening_balance'] = $opening_balance;

        //expense calculations
        $expense = Expense::query()
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->get()
            ->groupBy('category_id');

        $expenses = $expense->map(function ($payment) {
            return [
                'category' => VoucherCategory::find($payment->first()['category_id'])->name,
                'amount' => sprintf("%.2f", $payment->sum('voucher_amount')),
            ];
        });

        $total_expense = 0;
        foreach ($expenses as $expense) {
            $total_expense = sprintf("%.2f",  $total_expense + $expense['amount']);
        }

        $reports['expenses'] = $expenses;
        $reports['total_expense'] = $total_expense;



        //income calculations
        $incomes = Income::query()
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->get()
            ->groupBy('category_id');

        $incomes = $incomes->map(function ($income) {
            return [
                'category' => VoucherCategory::find($income->first()['category_id'])->name,
                'amount' => sprintf("%.2f", $income->sum('income_amount')),
            ];
        });

        $total_income = 0;
        foreach ($incomes as $income) {
            $total_income = sprintf("%.2f",  $total_income + $income['amount']);
        }

        $reports['incomes'] = $incomes;
        $reports['total_income'] = $total_income;



        //fdr deposit
        $fdr_deposit_amount = sprintf("%.2f", FixedDepositBalanceTransaction::query()
            ->where('type', 1)
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->sum('amount'));

        $reports['fdr_deposit_amount'] = $fdr_deposit_amount;

        //dps deposit
        $dps_deposit_amount = sprintf("%.2f", SavingsBalance::query()
            ->whereNull('withdraw')
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->sum('deposit'));

        $reports['dps_deposit_amount'] = $dps_deposit_amount;

        //general account deposit
        $general_account_deposit = sprintf("%.2f", GeneralAcTransactions::query()
            ->whereNull('withdraw')
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->sum('deposit'));

        $reports['general_account_deposit'] = $general_account_deposit;

        //general account withdraw
        $general_account_withdraw = sprintf("%.2f", GeneralAcTransactions::query()
            ->whereNull('deposit')
            ->where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->sum('withdraw'));

        $reports['general_account_withdraw'] = $general_account_withdraw;



        //total deposit amount
        $all_deposits = sprintf("%.2f", $fdr_deposit_amount + $dps_deposit_amount + $general_account_deposit);

        $reports['all_deposits'] = $all_deposits;


        return view('Reports.all_report.receive_payment_report.index', compact('reports'));
    }
}
