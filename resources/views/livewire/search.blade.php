<div class="container-search" style="display: block">
    <form wire:submit.prevent="searchHandle">
        <div class="grup-input">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <input type="text" id="search" wire:model="fieldInput">
        </div>
    </form>
    <div class="list-search">
        @foreach ($newsData as $news)
            <a class="a-not-link" href="/news/{{ $news['id'] }}">
                <div class="item-search" wire:key="news-{{ $news['id'] }}">
                    <h2 class="title">{{ $news['title'] }}</h2>
                    <div class="descriptions">{{ $news['description'] }}</div>
                    <div class="attribute">
                        <div class="tag">{{ $news['categories'] }}</div>
                        <div class="date">{{ $news['date'] }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

</div>
