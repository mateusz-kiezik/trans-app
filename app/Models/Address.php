<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    public function freights(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Freight::class);
    }
}
