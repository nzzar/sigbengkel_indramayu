<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }
}
