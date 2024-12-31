@if (Auth::user())
    <div class="{{ Auth::user()->name == $card->user->name ? 'container-chat-me' : 'container-chat-all' }}">
        <div class="buble-chat">
            <div class="user {{ Auth::user()->name == $card->user->name ? 'user-me' : '' }}">
                @if (Auth::user()->name == $card->user->name)
                    <p>{{ $card->user->name }}</p>
                    <div class="profile">
                        {{ substr($card->user->name, 0, 1) }}
                    </div>
                @else
                    <div class="profile">
                        {{ substr($card->user->name, 0, 1) }}
                    </div>
                    <p>{{ $card->user->name }}</p>
                @endif
            </div>
            <div class="chat {{ Auth::user()->name == $card->user->name ? 'chat-me' : 'chat-all' }}">
                @if ($card->file_path)
                    <img src="{{ config('app.url') }}/storage/{{ $card->file_path }}" alt="{{ $card->file_path }}"
                        width="100%">
                @endif
                <p>
                    {{ $card->message }}
                </p>
            </div>
        </div>
    </div>
@endif
