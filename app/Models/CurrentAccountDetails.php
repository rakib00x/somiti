<?php

namespace App\Models;

use App\Models\Accounts\CurrentAccount;
use App\Models\Accounts\Members;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentAccountDetails extends Model
{
    protected $guarded = [];
    public function members(){
        return $this->belongsTo(Members::class, 'account_id', 'account');
    }

    public function current_account()
    {
        return $this->hasMany(CurrentAccount::class, 'account', 'account_id');
    }

    public function getTotalCurrentDepositAttribute()      // reffered as $this->total_current_deposit
    {
        return $this->current_account()->where('account', $this->account_id)->sum('deposit_amount');
    }

    public function getTotalCurrentWithdrawAttribute()      // reffered as $this->total_current_withdraw
    {
        return $this->current_account()->where('account', $this->account_id)->sum('withdraw');
    }

    public function getTotalCurrentBalanceAttribute()      // reffered as $this->total_current_balance
    {
        return $this->total_current_deposit - $this->total_current_withdraw;
    }

    
}
