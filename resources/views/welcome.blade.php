<x-layout>
    <x-navbar />
    <main>
        {{-- Slideshow --}}
        <div id="slideshow"></div>

        <nav class="container">
            <div class="container-cp">
                @livewire('live-chat', ['roomId' => 1, 'title' => 'Public Chat'])
                <div class="container-panduan">
                    <div class="title">
                        <h2>Panduan</h2>
                        <a href="panduan"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                    <section id="panduan">
                        {!! $website['content'] !!}
                    </section>

                </div>
            </div>

            <div class="info-terbaru">
                <div class="title">
                    <h2>Informasi Terbaru</h2>
                    <a href="terbaru"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="card-container">
                    @foreach ($newinformation as $info)
                        <x-card route="{{ '/news/' . $info['id'] }}" thumbnail="{{ $info['thumbnail'] }}"
                            title="{{ $info['title'] }}" />
                    @endforeach
                </div>
            </div>

            <div class="info-terbaru">
                <div class="title">
                    <h2>Rekomendasi</h2>
                    <a href="rekomendasi"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                </div>
                <div class="card-container">
                    @foreach ($recoment as $recoment)
                        <x-card route="{{ '/news/' . $info['id'] }}" thumbnail="{{ $recoment['thumbnail'] }}"
                            title="{{ $recoment['title'] }}" />
                    @endforeach
                </div>
            </div>

            <nav class="bottom-card">
                <x-about />
                <x-perhatian />
                <x-information />
            </nav>
        </nav>
        <x-footer />
    </main>
</x-layout>
