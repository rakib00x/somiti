<?php

namespace App\Models\Primary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransactionHistory extends Model
{
    public function banklist(){
        return $this->belongsTo(banklist::class, 'bank_id');
    }
}
