<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'kategori',
        'tipe',
        'nama',
        'location',
        'foto',
        'jadwal',
        'jam_buka',
        'jam_tutup',
    ];

    protected $casts = [
        'jadwal' => 'array',
    ];
}
