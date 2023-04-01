<?php

namespace App\Models;

use App\Models\Accounts\CcLoan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CcLoanInstallment extends Model
{
    use HasFactory;


    protected $fillable = [
        'cc_loan_id',
        'date',
        'installment_no',
        'amount',
        'penalty',
        'main_balance_return',
        'note',
        'processed_by',
        'previous_profit',
        'profit_balance',
        'main_balance',
        

    ];


    public function cc_loan()
    {
        return $this->belongsTo(CcLoan::class, 'cc_loan_id', 'id');
    }

}
