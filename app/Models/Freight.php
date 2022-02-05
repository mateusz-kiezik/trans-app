<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Freight extends Model
{
    protected $table = 'freights';

    protected $fillable = [
        'start_address_id',
        'end_address_id',
        'start_date',
        'start_time_from',
        'end_date',
        'end_time_from',
        'truck_type_id',
        'truck_id',
        'cargo_id',
        'freight_type_id',
        'forwarder_id',
        'status_id'
    ];

    protected $casts = [
        'truck_id' => 'array'
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

//    public function cargoType()
//    {
//        return $this->belongsTo(CargoType::class);
//    }

    public function truckType()
    {
        return $this->belongsTo(TruckType::class);
    }

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

//    public function truck()
//    {
//        return $this->hasMany(Truck::class);
//    }

    public function freightType()
    {
        return $this->belongsTo(FreightType::class);
    }

    public function forwarder()
    {
        return $this->belongsTo(Forwarder::class);
    }

    public function startAddress()
    {
        return $this->belongsTo(Address::class, 'start_address_id');
    }

    public function endAddress()
    {
        return $this->belongsTo(Address::class, 'end_address_id');
    }

    //scopes
    public function scopeActive($query)
    {
        return $query
            ->where('status_id', 1);
    }

    public function scopeSort(Builder $query, $column, $direction)
    {
        return $query->where('status_id', 1)->orderBy($column, $direction);
    }

}
