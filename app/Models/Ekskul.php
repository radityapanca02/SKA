<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use Loggable;
    protected $table = 'ekskuls';

    protected $fillable = [
        'title',
        'desc',
        'image',
    ];
}
