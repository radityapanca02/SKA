<?php
namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use Loggable, HasFactory;
    protected $table = 'beritas';

    protected $fillable = [
        'title',
        'slug',
        'deskripsi',
        'content',
        'gambar',
        'views',
        'type',
    ];

    protected $casts = [
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->title);

                $originalSlug = $berita->slug;
                $count        = 1;
                while (static::where('slug', $berita->slug)->exists()) {
                    $berita->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });

        static::updating(function ($berita) {
            if ($berita->isDirty('title')) {
                $berita->slug = Str::slug($berita->title);

                $originalSlug = $berita->slug;
                $count        = 1;
                while (static::where('slug', $berita->slug)->where('id', '!=', $berita->id)->exists()) {
                    $berita->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Accessor untuk gambar
    public function getGambarUrlAttribute()
    {
        if ($this->gambar && file_exists(public_path('storage/' . $this->gambar))) {
            return asset('storage/' . $this->gambar);
        }
        return asset('assets/default.svg');
    }
}
