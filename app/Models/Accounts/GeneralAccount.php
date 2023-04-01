<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralAccount extends Model
{
    protected $guarded = [];
    public function members(){
        return $this->belongsTo(Members::class, 'account_id', 'account');
    }

    public function generalAc()
    {
        return $this->hasMany(GeneralAcTransactions::class,'account', 'account_id');
    }
}
