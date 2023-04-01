<?php

namespace App\Models;

use App\Models\Accounts\Members;
use App\Models\Primary\Staffs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StaffFund extends Model
{
    use HasFactory;


    protected $fillable= [
        'staff_id',
        'type',
        'amount',
        'date',
        'member_id',
        'details',
        'deposit_type',
        'processed_by'
        
    ];


    public function staff()
    {
        return $this->belongsTo(Staffs::class,'staff_id', 'id');
    }

    public function purpose(){
        return $this->belongsTo(StaffDepositPurpose::class, 'deposit_type', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Members::class, 'member_id', 'id');
    }

    public function processor(){
        return $this->belongsTo(User::class, 'processed_by', 'id');
    }



    
}
