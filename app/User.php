<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'website',
        'country',
        'region',
        'district',
        'city',
        'address',
        'object_type',
        'role_id',
        'status'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
