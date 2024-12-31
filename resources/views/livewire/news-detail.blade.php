<div>
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/page-news.css') }}">
    <x-navbar />
    <main>
        <nav class="container">
            <div class="container-news">
                <div class="header-news">
                    <h1>{{ $news['title'] }}</h1>
                    <div class="author">
                        <div class="profile" wire:click="setViewHour">
                            {{ implode('', array_map(fn($word) => $word[0], explode(' ', $news['author']))) }}
                        </div>
                        <div>
                            <p class="author-name">{{ $news['author'] }}</p>
                            <p class="updated"><b>Diperbarui</b> {{ $news['date'] }}</p>
                        </div>
                    </div>
                    <div class="action-detail" wire:poll.60s="setViewHour">
                        @livewire('news-action', ['newsId' => $news])
                    </div>
                </div>
                <div>
                    {!! $news['content'] !!}
                </div>
            </div>
        </nav>
        <x-footer />
    </main>
</div>
