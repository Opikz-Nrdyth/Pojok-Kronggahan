<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engagements extends Model
{
    use HasFactory;
    protected $fillable = ['content_id', 'clicks', 'view_hours', 'likes', 'dislikes'];

    public function news_relation()
    {
        return $this->belongsTo(News::class, 'content_id'); // Menghubungkan content_id dengan id di tabel news
    }
}
