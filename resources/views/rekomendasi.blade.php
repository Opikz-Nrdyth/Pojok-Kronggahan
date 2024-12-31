<x-layout>
    <link rel="stylesheet" href="{{ asset('css/page-news.css') }}">
    <x-navbar />
    <main>
        <nav class="container">
            <div class="conatiner-news">
                @foreach ($recoment as $news)
                    <div class="news">
                        <div class="news-item">
                            <a href="/news/{{ $news['id'] }}">
                                <img src="{{ asset('storage/' . $news['thumbnail']) }}" alt="{{ $news['title'] }}"
                                    height="150" width="150" />
                            </a>
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
                        <a class="gotolink" href="/news/{{ $news['id'] }}">
                            <button><i class="fa-solid fa-arrow-up-right-from-square"></i></button>
                        </a>
                    </div>
                @endforeach
            </div>
        </nav>
        <x-footer />
    </main>
</x-layout>
