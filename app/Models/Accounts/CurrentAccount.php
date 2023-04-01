<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrentAccount extends Model
{
    use HasFactory, SoftDeletes;
    public $fillable = [
        'date',
        'account',
        'deposit_amount',
        'withdraw',
    ];

    public function member()
    {
        return $this->belongsTo(Members::class, 'account', 'account');
    }

    public function getBalanceTillTransAttribute() // balance_till_trans
    {
        $transactions = $this->where('account', $this->account)
        ->whereRaw("(date <= $this->date or id <= $this->id)")->orderByDesc('id');
        return $transactions->sum('deposit_amount') - $transactions->sum('withdraw');
    }
}
