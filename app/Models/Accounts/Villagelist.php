<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Villagelist extends Model
{
    protected $guarded =[];
    public function postoffice(): BelongsTo
    {
        return $this->belongsTo(Postoffice::class, 'postoffice_id', 'id');
    }
}
