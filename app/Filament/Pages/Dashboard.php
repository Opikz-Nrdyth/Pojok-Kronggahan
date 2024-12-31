<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\News;
use App\Models\Engagements;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    protected static ?int $navigationSort = -2;

    // Override default dashboard
    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    public function getTotalUsers(): int
    {
        return User::count();
    }

    public function getTotalNews(): int
    {
        return News::count();
    }

    public function getTotalEngagements(): array
    {
        $totalLikes = Engagements::sum('likes');
        $totalDislikes = Engagements::sum('dislikes');
        $totalViewHours = Engagements::sum('view_hours');
        $totalClicks = Engagements::sum('clicks');

        return [
            'likes' => $totalLikes,
            'dislikes' => $totalDislikes,
            'viewHours' => abs($totalViewHours - round($totalViewHours, 2)) < 0.01  ? number_format($totalViewHours, 0) : number_format($totalViewHours, 2),
            'clicks' => $totalClicks
        ];
    }

    public function getEngagementTrends(): array
    {
        // Get engagement trends for last 7 days
        return Engagements::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(view_hours) as total_views'),
            DB::raw('SUM(likes) as total_likes'),
            DB::raw('SUM(dislikes) as total_dislikes')
        )
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->limit(7)
            ->get()
            ->toArray();
    }
}
