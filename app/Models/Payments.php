<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [

        'user_id',
        'amount',
        'phone',
        'from',
        'to',
        'month',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
