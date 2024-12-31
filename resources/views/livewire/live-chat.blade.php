<div class="container-chat container">
    <div>
        <div class="title">
            <h2>{{ $title }}</h2>
            <a href="live-chat"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
        <div class="messages">
            @foreach ($messages as $message)
                <x-live-chat :card="$message" />
            @endforeach
        </div>
    </div>
    <!-- Input Area -->
    <div class="input-area">
        <form wire:submit.prevent="sendMessage" class="input-form">
            @if ($title == 'service')
                <div class="input-file">
                    <input type="file" wire:model="attachment" id="file-upload" class="file-input">
                    <label for="file-upload" class="file-label">Input File</label>
                    @if ($attachment)
                        <div class="file-name">{{ $attachment->getClientOriginalName() }}</div>
                    @endif
                </div>
            @endif

            <div class="input-group">
                <div class="emoji-picker">
                    <button type="button" class="emoji-button" onclick="toggleEmojiPicker()">😀</button>
                    <div class="emoji-list hidden" id="emojiPicker">
                        <button type="button" class="emoji-item" onclick="addEmoji('😀')">😀</button>
                        <button type="button" class="emoji-item" onclick="addEmoji('😂')">😂</button>
                        <button type="button" class="emoji-item" onclick="addEmoji('😡')">😡</button>
                        <button type="button" class="emoji-item" onclick="addEmoji('😱')">😱</button>
                        <button type="button" class="emoji-item" onclick="addEmoji('😴')">😴</button>
                        <button type="button" class="emoji-item" onclick="addEmoji('🗿')">🗿</button>
                        <button type="button" class="emoji-item" onclick="addEmoji('👍')">👍</button>
                        <button type="button" class="emoji-item" onclick="addEmoji('👎')">👎</button>
                        <button type="button" class="emoji-item" onclick="addEmoji('❤️')" id="loveEmoji">❤️</button>
                        <!-- Add more emojis as needed -->
                    </div>
                </div>
                <div class="input-wrapper">
                    <input type="text" wire:model="newMessage" placeholder="Type your message..." class="text-input"
                        id="messageInput">
                </div>

                <button type="submit" class="send-button">
                    Send
                </button>
            </div>
        </form>
    </div>
    @vite('resources/js/app.js')
    @push('scripts')
        <script>
            const chatContainer = document.querySelector('.messages');

            function scrollToBottom() {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
            scrollToBottom()

            document.addEventListener("DOMContentLoaded", function(event) {
                Echo.channel('chat.{{ $room->id }}')
                    .listen('.message.sent', (e) => {
                        scrollToBottom();
                        @this.call('loadMessage', e.message);
                    });
            });

            function toggleEmojiPicker() {
                const emojiPicker = document.getElementById('emojiPicker');
                emojiPicker.classList.toggle('hidden');
            }

            function addEmoji(emoji) {
                const messageInput = document.getElementById('messageInput');
                messageInput.value += emoji;
                toggleEmojiPicker();
                if (emoji === '❤️') {
                    const surprise = document.getElementById('surprise');
                    surprise.classList.remove('hidden');
                    setTimeout(() => {
                        surprise.classList.add('hidden');
                    }, 3000);
                }
            }
        </script>
    @endpush
</div>
