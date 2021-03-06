<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'company',
        'admin',
        'forwarder'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return (bool) $this->admin;
    }

    public function isForwarder(): bool
    {
        return (bool) $this->forwarder;
    }

    public function scopeFilter(Builder $query, $userRole): Builder
    {
        if ($userRole == 'admin')
        {
            return $query->where('status', 1)
                ->where('admin', 1);
        } elseif ($userRole == 'forwarder')
        {
            return $query->where('status', 1)
                ->where('forwarder', 1)
                ->Where('admin', 0);
        } elseif ($userRole == 'user')
        {
            return $query->where('status', 1)
                ->where('forwarder', 0)
                ->where('admin', 0);
        } else
        {
            return $query->where('status', 1);
        }
    }
}
