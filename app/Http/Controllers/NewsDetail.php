<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsDetail extends Controller
{
    public function NewsDetail($id)
    {
        $getNews = News::with(['category_relation', 'user_relation', 'engagements_relation'])
            ->findOrFail($id);

        $news =  [
            'id' => $getNews->id,
            'title' => $getNews->title,
            'thumbnail' => $getNews->thumbnail,
            'categories' => $getNews->category_relation->name ?? 'Uncategorized',
            'date' => $getNews->updated_at->translatedFormat('d M Y, H:i:s'),
            'author' => $getNews->user_relation->name,
            'content' => $getNews->content,
        ];
        return view('news-detail', ['news' => (object) $news]);
    }
}
