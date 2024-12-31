<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'content',
        'thumbnail',
        'author',
        'category_id',
    ];

    /**
     * Relasi ke tabel 'category'
     */
    public function category_relation()
    {
        return $this->belongsTo(Categories::class, "category_id");
    }

    /**
     * Relasi ke tabel 'users' (penulis)
     */
    public function user_relation()
    {
        return $this->belongsTo(User::class, 'author', 'email');
        // 'author' adalah kolom yang menyimpan email, dan 'email' adalah kolom pada tabel 'users' yang menjadi foreign key
    }

    /**
     * Relasi ke tabel 'Engagements' (penulis)
     */
    public function engagements_relation()
    {
        return $this->hasMany(Engagements::class, 'content_id'); // Menghubungkan ke content_id di tabel engagements
    }

    /**
     * Event model untuk membuat data engagements
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($news) {
            $news->engagements_relation()->create([
                'clicks' => 0,
                'view_hours' => 0,
                'likes' => 0,
                'dislikes' => 0,
            ]);
        });

        static::deleting(function ($news) {
            // Hapus file thumbnail jika ada
            if ($news->thumbnail && Storage::exists($news->thumbnail)) {
                Storage::delete($news->thumbnail);
            }
            $news->engagements_relation()->delete(); // Hapus relasi di Engagements saat News dihapus
        });
    }
}
