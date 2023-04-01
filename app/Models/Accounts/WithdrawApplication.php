<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawApplication extends Model
{
    protected $guarded =[];

    public function member(){
       return $this->belongsTo(Members::class, 'account_id', 'account');
    }

}
