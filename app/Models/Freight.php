<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Freight extends Model
{
    protected $table = 'freights';

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function startAddress()
    {
        return $this->belongsTo(Address::class, 'start_address_id');
    }

    public function endAddress()
    {
        return $this->belongsTo(Address::class, 'end_address_id');
    }

}
