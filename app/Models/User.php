<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'password',
    ];
    public function payments()
    {
        return $this->hasMany(Payments::class);

    }
}
