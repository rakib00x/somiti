<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postoffice extends Model
{
    use HasFactory;
    protected $table = 'post_offices';
    protected $guarded = [];

    public function sub_district(){
        return $this->belongsTo(SubDistrict::class, 'sub_district_id');
    }
}
