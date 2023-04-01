<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralAcTransactions extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['account','deposit','withdraw','profit','note','deleted_by','date'];

    /**
     * Get the member that owns the GeneralAcTransactions
     */
    public function member()
    {
        return $this->belongsTo(Members::class, 'account', 'account');
    }


    // custom attributes
    public function getTotalDepositAttribute() // total_deposit
    {
        return $this->where('account', $this->account)->sum('deposit');
    }

    public function getTotalWithdrawAttribute() // total_withdraw
    {
        return $this->where('account', $this->account)->sum('withdraw');
    }

    public function getBalanceTillTransAttribute() // balance_till_trans
    {
        $transactions = $this->where('account', $this->account)
        // ->where('date', '<=', $this->date)
        // ->orderBy('id', 'desc')->get();
        ->whereRaw("(date <= $this->date or id <= $this->id)")->orderByDesc('id');
                        // ->where('id', '<=', $this->id)->get();
        return $transactions->sum('deposit') - $transactions->sum('withdraw');
    }
}
