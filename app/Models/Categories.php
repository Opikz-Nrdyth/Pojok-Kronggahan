<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi ke tabel 'news'
    public function news_relation()
    {
        return $this->hasMany(News::class);
    }
}
