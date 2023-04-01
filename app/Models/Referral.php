<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'fathers_name',
        'spouse',
        'profession',
        'social_status',
        'bussiness_name',
        'age',
        'present_address',
        'permanent_address',
        'nid_number',
        'mobile',
        'relation_with_member',
        'profile_pic',
        'grantor_nid',
    ];
}
