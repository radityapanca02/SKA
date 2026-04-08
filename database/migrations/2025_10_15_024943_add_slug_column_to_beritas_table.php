<?php

use App\Models\Berita;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddSlugColumnToBeritasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cek dulu apakah kolom slug sudah ada
        if (! Schema::hasColumn('beritas', 'slug')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('title');
            });
        }

        // Generate slug untuk data yang sudah ada
        $beritas = Berita::all();
        foreach ($beritas as $berita) {
            if (empty($berita->slug)) {
                $this->generateUniqueSlug($berita);
            }
        }

        // Set kolom slug menjadi not null dan unique
        Schema::table('beritas', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }

    /**
     * Generate unique slug for berita
     */
    private function generateUniqueSlug(Berita $berita): void
    {
        $slug         = Str::slug($berita->title);
        $originalSlug = $slug;
        $count        = 1;

        // Cek jika slug sudah ada
        while (Berita::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $berita->slug = $slug;
        $berita->save();
    }
}
