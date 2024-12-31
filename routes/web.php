<?php

use App\Http\Controllers\InformasiTerbaru;
use App\Http\Controllers\LiveChat;
use App\Http\Controllers\NewsDetail;
use App\Http\Controllers\Rekomendasi;
use App\Http\Controllers\Service;
use App\Http\Controllers\Welcome;
use App\Livewire\NewsDetail as LivewireNewsDetail;
use App\Models\News;
use App\Models\Website;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// API
Route::get('/api/slideshow', function () {
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
        ->take(10) // Ambil 10 data dengan skor tertinggi
        ->map(function ($newsItem) {
            $engagement = $newsItem->engagements_relation->first(); // Ambil engagement terkait

            return [
                'id' => $newsItem->id,
                'title' => $newsItem->title,
                'thumbnail' => env('APP_ROUTE_PUBLIC') . asset('/storage/' . $newsItem->thumbnail),
                'categories' => $newsItem->category_relation->name ?? 'Uncategorized', // Kategori
                'date' => $newsItem->updated_at->format('Y-m-d'), // Format tanggal
                'description' => $newsItem->description,
            ];
        });

    return response()->json($recoment);
});

Route::get('/check-auth', function () {
    if (Filament::auth()->check()) {
        return response()->json(['auth' => true, 'user' => auth()->user()]);
    } else {
        return response()->json(['auth' => false, 'user' => null]);
    }
})->name('check-auth');

Route::get('/api/logout', [Welcome::class, 'logout'])->name('logout');

// Routing
Route::get('/', [Welcome::class, 'welcome']);
Route::get('/live-chat', [LiveChat::class, 'LiveChat']);
Route::get('/panduan', function () {
    $website = Website::where('name', 'Panduan')->first();
    return view('panduan', ['website' => $website]);
});

Route::get('/terbaru', [InformasiTerbaru::class, 'InformasiTerbaru']);
Route::get('/rekomendasi', [Rekomendasi::class, 'Rekomendasi']);
Route::get('/service', [Service::class, 'Service']);
Route::get('/news/{id}', LivewireNewsDetail::class);
