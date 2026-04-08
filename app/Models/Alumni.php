<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use Loggable;
    protected $table = 'alumnis';

    protected $fillable = [
        'name',
        'graduation',
        'position',
        'company',
        'description',
        'image',
        'bg_color',
        'achievements',
    ];

    protected $casts = [
        'achievements' => 'array',
    ];

    // Accessor untuk memastikan achievements selalu array
    public function getAchievementsAttribute($value)
    {
        if (is_array($value)) {
            return $value;
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return is_array($decoded) ? $decoded : [];
        }

        return [];
    }

    // Mutator untuk memastikan achievements disimpan sebagai JSON
    public function setAchievementsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['achievements'] = json_encode($value);
        } elseif (is_string($value)) {
            // Jika string, coba decode dulu
            $decoded = json_decode($value, true);
            $this->attributes['achievements'] = is_array($decoded) ? $value : json_encode([$value]);
        } else {
            $this->attributes['achievements'] = json_encode([]);
        }
    }
}
