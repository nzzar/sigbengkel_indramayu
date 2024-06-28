<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description_bengkel',
        'adress',
        'telepon',
        'longitude',
        'latitude',
        'image',
    ];
}
