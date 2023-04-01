<?php

namespace App\Models\Accounts;

use App\Models\CcLoanInstallment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CcLoan extends Model
{
    use HasFactory;


    protected $fillable = [
        'account_id',
        'date',
        'loan_amount',
        'opening_balance',
        'installment_sequence',
        'details',
        'stamp_fee',
        'category_id',
        'start_date',
        'expire_date',
        'profit_rate',
        'profit_amount',
        'installment_amount',
        'panalty_amount',
        'attachment',
        'processing_fee',
        'admission_fee',
        'insurance_fee',
        'status',
        'processed_by',
        'approved_by',
        'profit_updated_at',
        'total_profit_generated',
        'type'
    ];



    public function member()
    {
        return $this->belongsTo(Members::class, 'account_id', 'account');
    }


    public function category()
    {
        return $this->belongsTo(CcLoanCategory::class, 'category_id', 'id');
    }


    public function installments()
    {
        return $this->hasMany(CcLoanInstallment::class, 'cc_loan_id', 'id');
    }


    public function getDueCcLoanProfitAmountAttribute()
    {

        
        return $this->total_profit_generated - CcLoanInstallment::where('cc_loan_id',$this->id )->sum('amount');
    }

    public function getCcLoanInstallmentNoAttribute()
    {

        
        return CcLoanInstallment::where('cc_loan_id',$this->id )->max('installment_no') +1;
    }

    public function getCcLoanPaidProfitAttribute()
    {
        return CcLoanInstallment::where('cc_loan_id',$this->id )->sum('amount');
    }

    public function getTotalReturnAttribute()
    {
        return ($this->total_profit_generated - CcLoanInstallment::where('cc_loan_id',$this->id )->sum('amount'))+ $this->loan_amount ;
    }
}
