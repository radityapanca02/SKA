<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'credit', 'folder', 'image'];

    // Accessor untuk handle image field
    public function getImageAttribute($value)
    {
        // Jika value adalah JSON array, ambil elemen pertama
        if (is_string($value) && json_decode($value) !== null) {
            $images = json_decode($value, true);
            return is_array($images) ? ($images[0] ?? $value) : $value;
        }
        
        // Jika sudah string biasa, return langsung
        return $value;
    }

    // Method untuk mendapatkan semua images (jika multiple)
    public function getAllImagesAttribute()
    {
        $value = $this->attributes['image'];
        
        if (is_string($value) && json_decode($value) !== null) {
            $images = json_decode($value, true);
            return is_array($images) ? $images : [$value];
        }
        
        return [$value];
    }
}