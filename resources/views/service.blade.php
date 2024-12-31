<x-layout>
    <x-navbar />
    <main>
        <nav class="container-page-chat">
            @livewire('live-chat', ['roomId' => (int) date('Ymd'), 'title' => 'Service'])
        </nav>
        <x-footer />

    </main>
</x-layout>
