<?php
// app/Models/Jurusan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jurusan',
        'departemen',
        'gambar',
        'deskripsi'
    ];

    protected $casts = [
        'departemen' => 'string'
    ];
}
