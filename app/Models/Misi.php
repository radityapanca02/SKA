<?php
// app/Models/Misi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;

    protected $fillable = [
        'profil_id',
        'misiImage',
        'misiTitle',
        'misiDesc',
        'misiColor',
        'order'
    ];

    protected $casts = [
        'misiColor' => 'string'
    ];

    public function profil()
    {
        return $this->belongsTo(Profil::class);
    }
}
