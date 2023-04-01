<?php

namespace App\Models;

use App\Models\Primary\Staffs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo(Staffs::class, 'staff_id');
    }
}
