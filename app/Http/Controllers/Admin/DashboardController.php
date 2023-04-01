<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accounts\FixedDiposit;
use App\Models\Accounts\FixedDipositProfit;
use App\Models\Accounts\GeneralAcTransactions;
use App\Models\Accounts\Loan;
use App\Models\Accounts\Members;
use App\Models\Expense;
use App\Models\Income;
use App\Models\LoanInstallments;
use App\Models\Primary\Area;
use App\Models\Primary\BranchList;
use App\Models\Primary\DirectorList;
use App\Models\Primary\Outloan;
use App\Models\Primary\Staffs;
use App\Models\Savings;
use App\Models\SavingsBalance;
use App\Models\StaffFund;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {


        $report = [];

        if (auth()->user()->hasRole('field-officer')) {
            // $branch_id = auth()->user()->staff->branch;
            $area_id = auth()->user()->staff->area ?? null;
            $area = Area::find($area_id);
            $savings = $area->savings()->with('deposits')->get();
            $monthly_savings = 0;
            foreach ($savings as $saving) {
                foreach ($saving->deposits as $deposit) {
                    $monthly_savings = $monthly_savings + $deposit->deposit;
                }
            }

            $report['loan_count']               = $area->loans->count();
            $report['investment']               = $area->loans->sum('loan_amount');
            $report['total_male_member']        = $area->members()->where('m_gender', 1)->count();
            $report['total_female_member']      = $area->members()->where('m_gender', 2)->count();
            $report['monthly_savings']          = $monthly_savings;
            $report['general_savings']          = $area->general_ac->sum('deposit') -  $area->general_ac->sum('withdraw');
            $report['current_ac']               = $area->current_ac->sum('deposit_amount') -  $area->current_ac->sum('withdraw');

            $report['investment_return']        = '45'; //$area->loans()->sum('loan_amount');

            $report['total_member']             = $area->members->count();

            $report['fdr_deposit']              = $area->fdr->sum('amount');
            $report['fdr_profit_served']        = FixedDipositProfit::sum('withdraw');
            $report['total_inactive_member']    = $area->members()->where('active', 0)->orWhere('active', null)->count();
        }



        if (auth()->user()->hasRole('admin|manager|accountant')) {
            $report['investment']               = Loan::sum('loan_amount');
            $report['total_area']               = Area::count();
            $report['total_member']             = Members::count();
            $report['general_savings']          = GeneralAcTransactions::sum('deposit') - GeneralAcTransactions::sum('withdraw');
            $report['monthly_savings']          = SavingsBalance::sum('deposit');
            $report['investment_return']        = LoanInstallments::sum('amount');
            $report['fdr_deposit']              = FixedDiposit::sum('amount');
            $report['fdr_profit_served']        = FixedDipositProfit::sum('withdraw');
            $report['total_branch']             = BranchList::count();
            $report['total_staff']              = Staffs::count();
            $report['total_staff_fund']         = StaffFund::groupBy('staff_id')->count();
            $report['total_voucher_income']     = Income::sum('income_amount');
            $report['total_voucher_expense']     = Expense::sum('voucher_amount');
            $report['total_savings_ac']         = Members::count();
            $report['total_monthly_savings_ac'] = Savings::count();
            $report['total_director']           = DirectorList::count();
            $report['total_male_member']        = Members::where('m_gender', 1)->count();
            $report['total_female_member']      = Members::where('m_gender', 2)->count();
            $report['total_inactive_member']    = Members::where('active', 0)->orWhere('active', null)->count();
            $report['total_outloan_account']    = Outloan::where('active', 1)->count();
            $report['total_loan_opening_fee']    = Loan::where('status', '!=', 4)->sum('open_fee');
        }


        return view('dashboard.index', compact('report'));
    }

    public function storage_link()
    {
        Artisan::call('storage:link');
        return redirect()->back()->with(Toastr::success('Storage Link Created Successfully!', 'Success'));
    }
    public function migrate()
    {
        Artisan::call('migrate');
        return redirect()->back()->with(Toastr::success('Migrate Successfully!', 'Success'));
    }

    public function dump_autoload()
    {

        Artisan::call('dump-autoload');
        return redirect()->back()->with(Toastr::success('Autoload Successful !', 'Success'));
    }
}
