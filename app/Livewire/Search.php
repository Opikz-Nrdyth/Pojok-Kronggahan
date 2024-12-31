<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;

class Search extends Component
{
    public $fieldInput = '';
    public $newsData = [];
    public function searchHandle()
    {
        $searchTerm = $this->fieldInput;
        $this->newsData = News::with(['category_relation', 'user_relation', 'engagements_relation'])
            ->where(function ($query) use ($searchTerm) {
                $query->where('title', 'LIKE', "%$searchTerm%")
                    ->orWhere('description', 'LIKE', "%$searchTerm%")
                    ->orWhere('content', 'LIKE', "%$searchTerm%")
                    ->orWhereHas('category_relation', function ($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', "%$searchTerm%");
                    })
                    ->orWhereHas('user_relation', function ($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', "%$searchTerm%");
                    });
            })
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
                    'categories' => $newsItem->category_relation->name ?? 'Uncategorized', // Kategori
                    'date' => $newsItem->updated_at->format('Y-m-d'), // Format tanggal
                    'description' => $newsItem->description,
                ];
            });

        if (count($this->newsData) == 1) {
            $newsItem = $this->newsData[0]; // Akses elemen pertama dari array
            return redirect()->to("/news/" . $newsItem['id']); // Sesuaikan dengan nama route
        }
    }


    public function render()
    {
        return view('livewire.search');
    }
}
