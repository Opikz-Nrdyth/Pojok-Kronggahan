<x-layout>
    <link rel="stylesheet" href="{{ asset('css/page-news.css') }}">
    <x-navbar />
    <main>
        <nav class="container">
            <div class="conatiner-news">
                @foreach ($newinformation as $news)
                    <div class="news-item">
                        <div class="thumbnail-container">
                            <a href="/news/{{ $news['id'] }}">
                                <img src="{{ env('APP_ROUTE_PUBLIC') . asset('storage/' . $news['thumbnail']) }}"
                                    alt="{{ $news['title'] }}" height="150px" width="150px" />
                            </a>
                        </div>
                        <div class="news-content">
                            <div class="news-category">
                                {{ $news['categories'] }}
                            </div>
                            <div class="news-date">
                                {{ $news['date'] }}
                            </div>
                            <div class="news-title">
                                {{ $news['title'] }}
                            </div>
                            <div class="news-description">
                                {{ $news['description'] }}
                            </div>
                            @livewire('news-action', ['newsId' => $news])
                        </div>
                    </div>
                @endforeach
            </div>
        </nav>
        <x-footer />
    </main>
</x-layout>
