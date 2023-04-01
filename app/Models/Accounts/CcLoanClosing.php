<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CcLoanClosing extends Model
{
    use HasFactory;


    protected $fillable = [
        'cc_loan_id',
        'closing_date',
        'fine',
        'total_return',
        'discount',
        'note',
        'processed_by',
        'approved_by',
    ];
}
