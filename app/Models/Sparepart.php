<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sparepart;

class Sparepart extends Model
{
    use HasFactory;

    protected $fillable = [
        'bengkel_id',
        'user_id',
        'title',
        'description',
        'image'
    ];
}
