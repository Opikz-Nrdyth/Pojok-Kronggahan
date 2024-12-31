<a href="{{ $route }}">
    <div class="card">
        <img src="{{ env('APP_ROUTE_PUBLIC') . asset('storage/' . $thumbnail) }}" alt="{{ $title }}">
        <div class="card-title">{{ $title }}</div>
    </div>
</a>
