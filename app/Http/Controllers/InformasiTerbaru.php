<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class InformasiTerbaru extends Controller
{
    public function InformasiTerbaru()
    {
        // Ambil 10 data terbaru berdasarkan update_at
        $newInformation = News::with(['category_relation', 'user_relation', 'engagements_relation'])
            ->orderBy('updated_at', 'desc') // Urutkan berdasarkan tanggal update
            ->get()
            ->map(function ($newsItem) {
                $engagement = $newsItem->engagements_relation->first();
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
        return view('informasi-terbaru', ['newinformation' => $newInformation,]);
    }
}
