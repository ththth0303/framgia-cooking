<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cooking extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'time',
        'status',
    ];
}
