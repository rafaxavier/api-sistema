<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'phone',
        'street',
        'number',
        'district',
        'city',
        'state',
        'zip_code'
    ];
}
