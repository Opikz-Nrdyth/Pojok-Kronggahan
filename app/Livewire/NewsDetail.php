<?php

namespace App\Livewire;

use App\Models\Engagements;
use App\Models\News;
use Livewire\Component;

class NewsDetail extends Component
{
    public $id;
    public $news;
    public $viewHours = 0;

    public function mount($id)
    {
        $this->id = $id;
        $this->loadNews();
        $this->LoadEngagement();
    }

    public function loadNews()
    {
        $getNews = News::with(['category_relation', 'user_relation', 'engagements_relation'])
            ->findOrFail($this->id);

        $this->news =  [
            'id' => $getNews->id,
            'title' => $getNews->title,
            'thumbnail' => $getNews->thumbnail,
            'categories' => $getNews->category_relation->name ?? 'Uncategorized',
            'date' => $getNews->updated_at->translatedFormat('d M Y, H:i:s'),
            'author' => $getNews->user_relation->name,
            'content' => $getNews->content,
            'like' => $getNews->engagements_relation->first()->likes,
            'dislike' => $getNews->engagements_relation->first()->dislikes
        ];
    }

    public function LoadEngagement()
    {
        $engagement = Engagements::where('content_id', $this->news["id"])->first();
        if ($engagement) {
            $this->viewHours = $engagement->view_hours;
        }
    }

    public function setViewHour()
    {
        $engagement = Engagements::where('content_id', $this->news["id"])->first();
        if ($engagement) {
            $engagement->view_hours += 1 / 60;
            $engagement->save();
            $this->LoadEngagement();
        }
    }

    public function render()
    {
        return view('livewire.news-detail')->layout('components.layout');
    }
}
