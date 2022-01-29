<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cargo_type_id',
        'qty',
        'weight',
        'description'
    ];

        public function cargoType()
    {
        return $this->belongsTo(CargoType::class);
    }
}
