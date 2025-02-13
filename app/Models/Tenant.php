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
        'nama',
        'location',
        'deskripsi',
        'deskripsi_en',
        'foto',
        'jam_buka',
        'jam_tutup',
    ];
}
