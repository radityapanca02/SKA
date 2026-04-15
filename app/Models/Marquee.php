<?php
// app/Models/Marquee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marquee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'gambar',
        'urutan'
    ];
}
