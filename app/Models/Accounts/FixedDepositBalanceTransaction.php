<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDepositBalanceTransaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'fdr_id',
        'account_id',
        'type',
        'amount',
        'processed_by',
        'date',
        'current_balance',
        'note',
        'new_profit_rate',
        'previous_profit_rate',
        'previous_balance'

    ];

    public function member()
    {
        return $this->belongsTo(Members::class, 'account_id', 'account');
    }

    public function fdr_account()
    {
        return $this->belongsTo(FixedDiposit::class, 'fdr_id', 'id');
    }
}
