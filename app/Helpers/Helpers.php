

<?php

use App\Models\Accounts\CcLoan;
use App\Models\Accounts\CcLoanClosing;
use App\Models\Accounts\Loan;
use App\Models\Accounts\LoanClosing;
use App\Models\Accounts\Members;
use App\Models\CcLoanInstallment;
use App\Models\Income;
use App\Models\LoanInstallments;
use App\Models\Savings;
use Carbon\Carbon;

if(!function_exists('custom_date_format')){

    function custom_date_format($date){
        $formated_date = date_create($date);
        return date_format($formated_date,"d M Y");
    }

}

if(!function_exists('total_income')){

    function total_income(){
        


        //members
        $member_admission_fee = Members::where('active', 1)->sum('admission_fee');
        $member_form_fee = Members::where('active', 1)->sum('form_fee');
        //loans
        $loan_open_fee = Loan::where('status', '!=', 4)->sum('open_fee');
        $loan_insurance_fee = Loan::where('status','!=', 4)->sum('insurance_fee');
        $loan_installment_penalty = LoanInstallments::sum('penalty');
        $loan_closing_penalty = LoanClosing::sum('penalty');

        //incomes
        $voucher_income = Income::where('status', 1)->sum('income_amount');

        //cc_loans
        $cc_loan_stamp_fee = CcLoan::where('status', '!=', 4)->sum('stamp_fee');
        $cc_loan_processing_fee = CcLoan::where('status', '!=', 4)->sum('processing_fee');
        $cc_loan_admission_fee = CcLoan::where('status', '!=', 4)->sum('admission_fee');
        $cc_loan_insurance_fee = CcLoan::where('status', '!=', 4)->sum('insurance_fee');
        $cc_loan_closing_fine = CcLoanClosing::sum('fine');
        $cc_loan_installment_penalty = CcLoanInstallment::sum('penalty');

        $saving_opening_charge = Savings::where('status', '!=', 4)->sum('opening_charge');
        $saving_penalty = Savings::where('status', '!=', 4)->sum('penalty');

        $total = $member_admission_fee + $member_form_fee + $loan_open_fee + $loan_insurance_fee + $loan_installment_penalty +$loan_closing_penalty + $voucher_income + $cc_loan_stamp_fee +$cc_loan_processing_fee + $cc_loan_admission_fee + $cc_loan_insurance_fee + $cc_loan_closing_fine + $cc_loan_installment_penalty + $saving_opening_charge + $saving_penalty;


        return $total;

    }


}

if(!function_exists('total_profit')){
    function total_profit(){

     $cc_loan_profit_generated = CcLoan::where('status' , '!=', 4)->sum('total_profit_generated');
     $cc_loan_profit_paid = CcLoanInstallment::sum('amount');
        
    }
}


if(!function_exists('total_income')){

    function total_income(){
        


        //members
        $member_admission_fee = Members::where('active', 1)->sum('admission_fee');
        $member_form_fee = Members::where('active', 1)->sum('form_fee');
        //loans
        $loan_open_fee = Loan::where('status', '!=', 4)->sum('open_fee');
        $loan_insurance_fee = Loan::where('status','!=', 4)->sum('insurance_fee');
        $loan_installment_penalty = LoanInstallments::sum('penalty');
        $loan_closing_penalty = LoanClosing::sum('penalty');

        //incomes
        $incomes = Income::where('status', 1)->sum('income_amount');

        //cc_loans
        $cc_loan_stamp_fee = CcLoan::where('status', '!=', 4)->sum('stamp_fee');
        $cc_loan_processing_fee = CcLoan::where('status', '!=', 4)->sum('processing_fee');
        $cc_loan_admission_fee = CcLoan::where('status', '!=', 4)->sum('admission_fee');
        $cc_loan_insurance_fee = CcLoan::where('status', '!=', 4)->sum('insurance_fee');
        $cc_loan_closing_fine = CcLoanClosing::sum('fine');
        $cc_loan_installment_penalty = CcLoanInstallment::sum('penalty');

        $saving_opening_charge = Savings::where('status', '!=', 4)->sum('opening_charge');
        return $saving_penalty = Savings::where('status', '!=', 4)->sum('penalty');

    }


}


if(!function_exists('hour_passed')){

    function hour_passed($current_time){
        $current_time = Carbon::parse($current_time);
        $hours = $current_time->diffInHours(now());
        if($hours >= 1){
            return true;
        }else{
            return false;
        }

    }
}












