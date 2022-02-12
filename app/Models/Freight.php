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

    public function scopeFinder(Builder $query, $parameters)
    {
        $weight = $parameters['weight'];
        $startCity = $parameters['loadingCity'];
        $startCountry = $parameters['loadingCountry'];
        $endCity = $parameters['unloadingCity'];
        $endCountry = $parameters['unloadingCountry'];

        return $query
            ->whereHas('Cargo', function ($q) use ($weight) {
                $q->where('weight', '<=', $weight);
            })
            ->whereHas('startAddress', function ($q) use ($startCity) {
                $q->where('city', 'LIKE', $startCity);
            })
            ->whereHas('startAddress', function ($q) use ($startCountry) {
                $q->where('country', 'LIKE', $startCountry);
            })
            ->whereHas('endAddress', function ($q) use ($endCity) {
                $q->where('city', 'LIKE', $endCity);
            })
            ->whereHas('endAddress', function ($q) use ($endCountry) {
                $q->where('country', 'LIKE', $endCountry);
            })
            ->where('start_date', '>=', $parameters['loadingDateFrom'] ?? '1960-01-01')
            ->where('start_date', '<=', $parameters['loadingDateTo'] ?? '2100-12-31')
            ->where('end_date', '>=', $parameters['unloadingDateFrom'] ?? '1960-01-01')
            ->where('end_date', '<=', $parameters['unloadingDateTo'] ?? '2100-12-31')
            ->whereIn('truck_type_id', $parameters['truckType']);

    }

}
