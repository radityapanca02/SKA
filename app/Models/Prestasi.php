<?php
// app/Models/Prestasi.php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use Loggable;
    protected $table = 'prestasis';

    protected $fillable = [
        'nama',
        'subjudul',
        'gambar',
    ];
}
