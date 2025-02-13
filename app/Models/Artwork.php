<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'location',
        'deskripsi',
        'deskripsi_en',
        'foto',
    ];
}
