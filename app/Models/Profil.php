<?php
// app/Models/Profil.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'heroImage',
        'heroTitle',
        'profilImage1',
        'profilImage2',
        'profilImage3',
        'profilDesc',
        'visiImage',
        'visiImageName',
        'visiDesc',
        'youtubeSrc'
    ];

    public function misis()
    {
        return $this->hasMany(Misi::class)->orderBy('order');
    }
}
