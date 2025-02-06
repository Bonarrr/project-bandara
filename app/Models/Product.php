<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'kategori',
        'nama',
        'harga',
        'deskripsi',
        'foto',
        'jadwal',
        'jam_buka',
        'jam_tutup',
    ];

    protected $casts = [
        'jadwal' => 'array',
    ];
}