<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'deskripsi_en',
        'tipe',
        'foto',
    ];

    protected $casts = [
        'tipe' => 'array',
    ];
}
