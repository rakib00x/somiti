<?php

namespace App\Models\Accounts;

use App\Models\CcLoanInstallment;
use App\Models\CurrentAccountDetails;
use App\Models\LoanInstallments;
use App\Models\Primary\Area;
use App\Models\Relation;
use App\Models\Savings;
use App\Models\SavingsBalance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Members extends Model
{
    use HasFactory;
    protected $guarded =[];

    // The accessors to append to the model's array form.
    protected $appends = ['photo', 'address','total_deposit','total_withdraw','due_loan_amount'];

    /// relationships to area
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // relation to district--
    public function district(){
        return $this->belongsTo(District::class, 'm_district');
    }

    // relation to sub district--
    public function SubDistrict(){
        return $this->belongsTo(SubDistrict::class, 'm_thana');
    }
    // relation to Postoffice--
    public function PostOffice(){
        return $this->belongsTo(Postoffice::class, 'm_post');
    }

    // relation to village--
    public function Village(){
        return $this->belongsTo(Villagelist::class, 'm_village');
    }

    // relation to nominnee relation--
    public function relation(){
        return $this->belongsTo(Relation::class, 'n_relation');
    }

    // Get all of the savings for the Members
    public function savings()
    {
        return $this->hasMany(Savings::class, 'account_id', 'account');
    }



    // Get all of the savings transaction for the Member
    public function dps_trans()
    {
        return $this->hasManyThrough(SavingsBalance::class, Savings::class, 'account_id', 'savings_id', 'account');
        // return $this->hasManyThrough(SavingsBalance::class,Savings::class, 'account_id', 'savings_id', 'id', 'id');
    }


    public function getDpsBalanceAttribute() //$this->dps_balance
    {
        return $this->dps_trans()->sum('deposit') - $this->dps_trans()->sum('withdraw');
    }

    public function dps()
    {
        return $this->hasMany(Savings::class, 'account_id', 'account');
    }


    // relationship to Fixed deposit account
    public function fdr()
    {
        return $this->hasMany(FixedDiposit::class, 'account', 'account');
    }

    public function fdr_balance()
    {
        return $this->hasOne(FixedDiposit::class, 'account', 'account');
    }
    
    


    // relationship to general account transactions
    public function generalAc()
    {
        return $this->hasMany(GeneralAcTransactions::class,'account', 'account');
    }

    // relationship to general account
    public function generalAccount()
    {
        return $this->hasMany(GeneralAccount::class,'account_id', 'account');
    }

    //general account balance
    public function getGeneralAccountBalanceAttribute() //$this->general_account_balance
    {
        return $this->generalAc()->sum('deposit') - $this->generalAc()->sum('withdraw');
    }

    // current account transaction
    public function currentAccount()
    {
        return $this->hasMany(CurrentAccount::class, 'account', 'account');
    }

     // current account
     public function currentAccounts()
     {
         return $this->hasOne(CurrentAccountDetails::class, 'account_id', 'account');
     }

    public function loans()
    {
        return $this->hasMany(Loan::class,'account_id','account');
    }

    public function loanTrans()
    {
        return $this->hasManyThrough(LoanInstallments::class, Loan::class, 'account_id', 'loan_id', 'account');
    }

    public function getLoanDueBalanceAttribute() //$this->loan_due_balance
    {
        $loans = $this->loans()->get();

        $total_amount = 0;

        foreach($loans as $loan){
            $total_amount = $total_amount + $loan->total_amount;
        }

        return $total_amount - $this->loanTrans()->sum('amount');
    }



    public function cc_loans()
    {
        return $this->hasMany(CcLoan::class, 'account_id', 'account');
    }



    // defined attributes

    public function getPhotoAttribute()             // reffered as $this->photo
    {
        $member_photo = 'storage/uploads/members/' . $this->m_photo;
        $default_image = 'images/default_member_image.jpg';
        return empty($this->m_photo) ? $default_image : $member_photo;
    }

    public function getAddressAttribute()           // reffered as $this->address
    {
        $post_code = $this->post_code ? $this->post_code . ', ' : '';
        $village = $this->m_village ? $this->m_village . ', ' : '';
        $post = $this->PostOffice ? $this->PostOffice->title . ', ' : '';
        $thana = $this->SubDistrict ? $this->SubDistrict->title . ', ' : '';
        $district = $this->district?  $this->district->title . '.' : '';
        $address = $post_code. $village . $post . $thana . $district;

        return $address ? $address : "(No address found)";
    }

    public function getTotalDepositAttribute()      // reffered as $this->total_deposit
    {
        return $this->generalAc()->where('account', $this->account)->sum('deposit');
    }

    public function getAccountSavingsAmountAttribute() //reffered as $this->account_savings_amount
    {
        return $this->savings()->where('account_id', $this->account)->sum('savings_amount');
    }

    // general account total withdraw
    public function getTotalWithdrawAttribute()     // reffered as $this->total_withdraw
    {
        return $this->generalAc()->where('account', $this->account)->sum('withdraw');
    }

    // get general ac balance
    public function getAcBalanceAttribute()         // reffered as $this->ac_balance
    {
        return $this->total_deposit - $this->total_withdraw;
    }

    // get total loan due amount
    public function getDueLoanAmountAttribute() //reffered as $this->due_loan_amount
    {
        return $this->loans()->where('account_id', $this->account)->sum('loan_amount');
    }

    // get current account total deposit amount
    public function getCdAcTotalDepositAttribute() // $member->cd_ac_total_deposit
    {
        return $this->currentAccount()->where('account', $this->account)->sum('deposit_amount');
    }

    // get current account total withdraw
    public function getCdAcTotalWithdrawAttribute() // $member->cd_ac_total_withdraw
    {
        return $this->currentAccount()->where('account', $this->account)->sum('withdraw');
    }

    // get current account balance
    public function getCdAcBalanceAttribute() // $member->cd_ac_balance
    {
        return $this->cd_ac_total_deposit - $this->cd_ac_total_withdraw;
    }

    //get active loan
    public function getActiveLoanAttribute() // reffered as $this->active_loan
    {
        return $this->loans()->where('account_id', $this->account)->whereIn('status', [2,3])->get();
    }

    //get active loan
    public function getActiveDpsAttribute() // reffered as $this->active_dps
    {
        return $this->savings()->where('account_id', $this->account)->whereIn('status', [1,2])->get();
    }

    //get current dps balance
    public function getCurrentDpsBalanceAttribute() // reffered as $this->current_dps_balance
    {
        // $dps = $this->savings()->where('account_id', $this->account)->whereIn('status', [1,2]);
        // return $dps->sum('deposit') - $dps->sum('withdraw');
        $dps_trans = $this->dps_trans()->where('account_id', $this->account)->whereIn('status',[1,2]);
        return $dps_trans->sum('deposit') - $dps_trans->sum('withdraw');
    }



    // get total profit due of cc_loan
    public function getDueCcLoanProfitAmountAttribute() //$this->due_cc_loan_profit_amount
    {

        $cc_loan = $this->cc_loan()->first();
        return $cc_loan->total_profit_generated - CcLoanInstallment::where('cc_loan_id',$cc_loan->id )->sum('amount');
    }

    // get installment no of cc loan installment
    public function getCcLoanInstallmentNoAttribute() //$this->cc_loan_installment_no
    {

        $cc_loan = $this->cc_loan()->first();
        return CcLoanInstallment::where('cc_loan_id',$cc_loan->id )->max('installment_no') +1;
    }

    //get paid profit of cc_loan
    public function getCcLoanPaidProfitAttribute() //$this->cc_loan_paid_profit
    {

        $cc_loan = $this->cc_loan()->first();
        return CcLoanInstallment::where('cc_loan_id',$cc_loan->id )->sum('amount');
    }

}


