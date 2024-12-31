<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pojok Kronggahan</title>
    <link rel="icon" href="{{ config('app.url') . env('APP_ROUTE_PUBLIC') . '/storage/images/logo.svg' }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/welcome.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/slideshow.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/live-chat.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/panduan.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/information.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/perhatian.css') }}">
    <link rel="stylesheet" href="{{ env('APP_ROUTE_PUBLIC') . asset('css/footer.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="antialiased">

    {{ $slot }}

    <!-- partial untuk cdn react js -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react-dom.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/classnames/2.2.5/index.min.js'></script>

    <script src="https://cdn.jsdelivr.net/npm/livewire@latest/dist/livewire.js"></script>

    <script src="{{ env('APP_ROUTE_PUBLIC') . asset('js/slideshow.js') }}"></script>
    <script src="{{ env('APP_ROUTE_PUBLIC') . asset('js/welcome.js') }}"></script>
    @stack('scripts')
</body>

</html>
