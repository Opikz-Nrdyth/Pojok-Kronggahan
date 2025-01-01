<x-layout>
    <link rel="stylesheet" href="{{ asset('css/page-news.css') }}">
    <x-navbar />
    <main>
        <nav class="container">
            <div class="container-news">
                <div class="header-news">
                    <h1>{{ $news->title }}</h1>
                    <div class="author">
                        <div class="profile">
                            {{ implode('', array_map(fn($word) => $word[0], explode(' ', $news->author))) }} </div>
                        <div>
                            <p class="author-name">{{ $news->author }}</p>
                            <p class="updated"><b>Diperbarui</b> {{ $news->date }}</p>
                        </div>
                    </div>
                </div>
                <div class="content-news">
                    {!! $news->content !!}
                </div>
            </div>
        </nav>
        <x-footer />
    </main>
</x-layout>
