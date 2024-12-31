<?php

namespace App\Livewire;

use App\Models\Engagements;
use App\Models\News;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class NewsAction extends Component
{
    public $newsId;
    public $likedIds = [];
    public $dislikedIds = [];

    public function mount($newsId)
    {
        $this->newsId = $newsId;
        $this->likedIds = json_decode(Cookie::get('liked_news', '[]'), true);
        $this->dislikedIds = json_decode(Cookie::get('disliked_news', '[]'), true);
    }

    public function loadNews()
    {
        $engagement = Engagements::where('content_id', $this->newsId)->first();
        $this->newsId = [
            $this->newsId,
            'id' => $engagement->content_id,
            'like' => $engagement?->likes ?? 0,
            'dislike' => $engagement?->dislikes ?? 0,
        ];
    }

    public function like()
    {
        $engagement = Engagements::where('content_id', $this->newsId)->first();

        if (!in_array($this->newsId["id"], $this->likedIds)) {
            if ($engagement) {
                $engagement->increment('likes');
                $this->likedIds[] = $this->newsId["id"];

                // Simpan array ke cookie, berlaku 1 tahun
                Cookie::queue('liked_news', json_encode($this->likedIds), 60 * 24 * 365);
                $this->loadNews();
            }
        } else {

            if ($engagement) {
                $engagement->decrement('likes');
                $key = array_search($this->newsId['id'], $this->likedIds);
                if ($key !== false) {
                    unset($this->likedIds[$key]);
                }
                Cookie::queue('liked_news', json_encode($this->likedIds), 60 * 24 * 365);
                $this->loadNews();
            }
        }
    }

    public function dislike()
    {
        $engagement = Engagements::where('content_id', $this->newsId)->first();

        if (!in_array($this->newsId["id"], $this->dislikedIds)) {
            if ($engagement) {
                $engagement->increment('dislikes');
                $this->dislikedIds[] = $this->newsId["id"];

                // Simpan array ke cookie, berlaku 1 tahun
                Cookie::queue('disliked_news', json_encode($this->dislikedIds), 60 * 24 * 365);
                $this->loadNews();
            }
        } else {

            if ($engagement) {
                $engagement->decrement('dislikes');
                $key = array_search($this->newsId['id'], $this->dislikedIds);
                if ($key !== false) {
                    unset($this->dislikedIds[$key]);
                }
                Cookie::queue('disliked_news', json_encode($this->dislikedIds), 60 * 24 * 365);
                $this->loadNews();
            }
        }
    }

    public function render()
    {
        return view('livewire.news-action');
    }
}
