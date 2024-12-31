<x-layout>
    <x-navbar />
    <main>
        <div class="container-page-chat">
            @livewire('live-chat', ['roomId' => 1, 'title' => 'Public Chat'])
        </div>
        <x-footer />
    </main>
</x-layout>
