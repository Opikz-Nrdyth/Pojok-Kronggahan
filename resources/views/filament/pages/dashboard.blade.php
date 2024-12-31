<x-filament-panels::page>
    <style>
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 768px) {
            .dashboard-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .stats-card {
            position: relative;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            background-color: white;
            padding: 1rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .stats-content {
            display: flex;
            align-items: center;
        }

        .stats-data {
            flex: 1;
            min-width: 0;
            margin-left: 1.25rem;
        }

        .stats-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #6b7280;
        }

        .stats-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: #111827;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        @media (min-width: 1024px) {
            .charts-grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .chart-card {
            position: relative;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
            background-color: white;
            padding: 1rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .chart-title {
            font-size: 1.125rem;
            font-weight: 500;
            color: #111827;
        }

        .chart-container {
            margin-top: 1rem;
            height: 200px;
        }

        .ratio-bar {
            display: flex;
            height: 1rem;
            overflow: hidden;
            border-radius: 9999px;
            background-color: #e5e7eb;
        }

        .ratio-likes {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #22c55e;
            transition: width 0.3s ease;
        }

        .ratio-dislikes {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ef4444;
            transition: width 0.3s ease;
        }

        .ratio-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 0.5rem;
            font-size: 0.875rem;
        }

        .ratio-likes-text {
            color: #16a34a;
        }

        .ratio-dislikes-text {
            color: #dc2626;
        }

        /* .trend-chart {
            display: flex;
            height: 160px;
            align-items: flex-end;
            gap: 0.5rem;
            padding: 1rem;
            margin-top: 2rem;
        }

        .trend-bar-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            position: relative;
        }

        .trend-bar {
            width: 100%;
            background-color: #3b82f6;
            transition: height 0.3s ease;
            border-radius: 4px 4px 0 0;
            min-height: 2px;
        }

        .trend-value {
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
            color: #6b7280;
            white-space: nowrap;
        }

        .trend-date {
            margin-top: 8px;
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        } */
    </style>

    <div class="dashboard-grid">
        <div class="stats-card">
            <div class="stats-content">
                <div class="stats-data">
                    <div class="stats-label">Total Users</div>
                    <div class="stats-value">{{ $this->getTotalUsers() }} Users</div>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-content">
                <div class="stats-data">
                    <div class="stats-label">Total News</div>
                    <div class="stats-value">{{ $this->getTotalNews() }} News</div>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-content">
                <div class="stats-data">
                    <div class="stats-label">Total View Hours</div>
                    <div class="stats-value">{{ $this->getTotalEngagements()['viewHours'] }} Hour</div>
                </div>
            </div>
        </div>

        <div class="stats-card">
            <div class="stats-content">
                <div class="stats-data">
                    <div class="stats-label">Total Clicks</div>
                    <div class="stats-value">{{ $this->getTotalEngagements()['clicks'] }} Clicks</div>
                </div>
            </div>
        </div>
    </div>

    <div class="charts-grid">
        <div class="chart-card">
            <h3 class="chart-title">Like vs Dislike Ratio</h3>
            <div class="chart-container">
                @php
                    $engagements = $this->getTotalEngagements();
                    $totalInteractions = $engagements['likes'] + $engagements['dislikes'];
                    $likePercentage = $totalInteractions > 0 ? ($engagements['likes'] / $totalInteractions) * 100 : 0;
                    $dislikePercentage =
                        $totalInteractions > 0 ? ($engagements['dislikes'] / $totalInteractions) * 100 : 0;
                @endphp
                <div class="ratio-bar">
                    <div class="ratio-likes" style="width: {{ $likePercentage }}%"></div>
                    <div class="ratio-dislikes" style="width: {{ $dislikePercentage }}%"></div>
                </div>
                <div class="ratio-stats">
                    <span class="ratio-likes-text">
                        Likes: {{ number_format($engagements['likes']) }} ({{ number_format($likePercentage, 1) }}%)
                    </span>
                    <span class="ratio-dislikes-text">
                        Dislikes: {{ number_format($engagements['dislikes']) }}
                        ({{ number_format($dislikePercentage, 1) }}%)
                    </span>
                </div>
            </div>
        </div>

        {{-- <div class="chart-card">
            <h3 class="chart-title">View Hours Trend (Last 7 Days)</h3>
            <div class="chart-container">
                @php
                    $trends = $this->getEngagementTrends();
                    $maxViews = max(array_column($trends, 'total_views'));
                @endphp
                <div class="trend-chart">
                    @foreach ($trends as $trend)
                        <div class="trend-bar-container">
                            <span class="trend-value">{{ $trend['total_views'] }}</span>
                            <div class="trend-bar"
                                style="height: {{ $maxViews > 0 ? ($trend['total_views'] / $maxViews) * 100 : 0 }}%">
                            </div>
                            <span class="trend-date">
                                {{ \Carbon\Carbon::parse($trend['date'])->format('d/m') }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    </div>
</x-filament-panels::page>
