<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanStatistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'departemen',
        'type',
        'jumlah'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
