<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SocialMedia;
use App\Models\Website;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Welcome extends Controller
{
    public function welcome()
    {
        // Ambil 10 data terbaru berdasarkan update_at
        $newInformation = News::with(['category_relation', 'user_relation', 'engagements_relation'])
            ->orderBy('updated_at', 'desc') // Urutkan berdasarkan tanggal update
            ->take(10) // Ambil 10 data terbaru
            ->get()
            ->map(function ($newsItem) {
                return [
                    'id' => $newsItem->id,
                    'title' => $newsItem->title,
                    'thumbnail' => $newsItem->thumbnail,
                    'categories' => $newsItem->category_relation->name ?? 'Uncategorized', // Kategori
                    'date' => $newsItem->updated_at->format('Y-m-d'), // Format tanggal
                    'description' => $newsItem->description,
                ];
            });

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
            ->take(10) // Ambil 10 data dengan skor tertinggi
            ->map(function ($newsItem) {
                $engagement = $newsItem->engagements_relation->first(); // Ambil engagement terkait

                return [
                    'id' => $newsItem->id,
                    'title' => $newsItem->title,
                    'thumbnail' => $newsItem->thumbnail,
                    'categories' => $newsItem->category_relation->name ?? 'Uncategorized', // Kategori
                    'date' => $newsItem->updated_at->format('Y-m-d'), // Format tanggal
                    'description' => $newsItem->description,
                ];
            });

        $website = Website::where('name', 'Panduan')->first();

        return view('welcome', [
            'newinformation' => $newInformation,
            'recoment' => $recoment,
            'website' => $website

        ]);
    }

    public function logout(Request $request)
    {
        // Logout dari Filament dan regular auth
        Filament::auth()->logout();
        Auth::logout();

        // Invalidate session dan regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau home
        return redirect()->route('filament.admin.auth.login');
    }
}
