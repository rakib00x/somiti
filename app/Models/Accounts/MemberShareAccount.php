<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberShareAccount extends Model
{
    protected $guarded = [];
    public function member(){
        return $this->belongsTo(Members::class, 'account_number', 'account');
    }

    

    public function getCurrentBalanceAttribute() //current_balance
    {
        $current_share = Members::where('account', $this->account_number)->pluck('share')->first();

        $transactions = $this->where('id' ,'>', $this->id )->get();
        $deposit = $transactions->where('transaction_type', 'Purchase')->sum('amount');
        
        $withdraw = $transactions->where('transaction_type', 'Sale')->sum('amount');
        return $current_share - $deposit +$withdraw;


    
        
         
    }
}
