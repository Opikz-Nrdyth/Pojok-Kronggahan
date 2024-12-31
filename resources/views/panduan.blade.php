<x-layout>
    <x-navbar />
    <main>
        <nav class="container">
            <div class="container-panduan">
                <div class="title">
                    <h2>Panduan</h2>
                </div>
                <section id="panduan">
                    {!! $website['content'] !!}
                </section>

            </div>
        </nav>
        <x-footer />
    </main>
</x-layout>
