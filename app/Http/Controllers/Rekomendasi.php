<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class Rekomendasi extends Controller
{
    public function Rekomendasi()
    {
        // Ambil 10 data berdasarkan engagement (klik, view_hours, like, dislike)
        $recoment = News::with(['category_relation', 'user_relation', 'engagements_relation'])
            ->get()
            ->sortByDesc(function ($newsItem) {
                $engagement = $newsItem->engagements_relation->first(); // Mengambil data pertama dari relasi engagement

                if ($engagement) {
                    // Hitung skor berdasarkan engagement
                    $score = ($engagement->view_hours * 0.40) +
                        ($engagement->clicks * 0.40) +
                        ($engagement->likes * 0.20) -
                        ($engagement->dislikes * 0.10);
                } else {
                    // Jika tidak ada engagement, set skor menjadi 0
                    $score = 0;
                }

                return $score;
            })
            ->map(function ($newsItem) {
                $engagement = $newsItem->engagements_relation->first(); // Ambil engagement terkait

                return [
                    'id' => $newsItem->id,
                    'title' => $newsItem->title,
                    'thumbnail' => $newsItem->thumbnail,
                    'categories' => $newsItem->category_relation->name ?? 'Uncategorized', // Kategori
                    'date' => $newsItem->updated_at->format('Y-m-d'), // Format tanggal
                    'description' => $newsItem->description,
                    'like' => $engagement ? $engagement->likes : 0,
                    'dislike' => $engagement ? $engagement->dislikes : 0,
                ];
            });

        return view('rekomendasi', ['recoment' => $recoment]);
    }
}
