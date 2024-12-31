<x-filament-panels::page>
    <style>
        .chat-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

        }

        .chat-box {
            display: flex;
            flex-direction: column;
            height: 70vh;
        }

        .messages-container {
            flex: 1;
            padding: 16px;
            overflow: auto;
        }

        .message {
            margin-bottom: 16px;
            max-width: 70%;
        }

        .message-own {
            margin-left: auto;
        }

        .message-content {
            position: relative;
            padding: 12px;
            border-radius: 16px;
            margin-bottom: 8px;
            max-width: 100%;
        }

        .message-own-content {
            background: #d1e7dd;
            color: #0f5132;
            border-top-right-radius: 0;
        }

        .message-other-content {
            background: rgb(220, 220, 220);
            color: black;
            border-top-left-radius: 0;
        }

        .message-own-content::after,
        .message-other-content::after {
            content: '';
            position: absolute;
            top: 10px;
            width: 8px;
            height: 8px;
            background: inherit;
            transform: rotate(45deg);
        }

        .message-own-content::after {
            right: -4px;
        }

        .message-other-content::after {
            left: -4px;
        }

        .message-user {
            font-weight: 500;
            font-size: 14px;
        }

        .message-text {
            margin-top: 8px;
            font-size: 14px;
        }

        .message-time {
            margin-top: 8px;
            font-size: 12px;
            color: #6b7280;
        }

        .input-area {
            border-top: 1px solid #e5e7eb;
            padding: 16px;
        }

        .input-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .input-wrapper {
            flex: 1;
        }

        .text-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            font-size: 14px;
        }

        .send-button {
            background: #0288d1;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .send-button:hover {
            background: #0277bd;
        }

        .emoji-picker {
            position: relative;
        }

        .emoji-button {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .emoji-list {
            position: absolute;
            bottom: 40px;
            left: 0;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 8px;
            padding: 8px;
            z-index: 10;
        }

        .emoji-item {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
        }

        .hidden {
            display: none;
        }

        .surprise {
            position: fixed;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            background: #f9f871;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
    </style>
    @vite('resources/css/app.css')

    <div class="chat-container">
        <div class="chat-box">
            <!-- Messages -->
            <div class="messages-container">
                @foreach ($messages as $message)
                    <div class="message {{ $message->user_id === auth()->id() ? 'message-own' : '' }}">
                        <div
                            class="message-content {{ $message->user_id === auth()->id() ? 'message-own-content' : 'message-other-content' }}">
                            <div class="message-user">{{ $message->user->name }}</div>
                            <div class="message-text">{{ $message->message }}</div>
                            <div class="message-time">{{ $message->created_at->format('H:i') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Input Area -->
            <div class="input-area">
                <form wire:submit.prevent="sendMessage" class="input-form">
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
                            <button type="button" class="emoji-item" onclick="addEmoji('❤️')"
                                id="loveEmoji">❤️</button>
                            <!-- Add more emojis as needed -->
                        </div>
                    </div>

                    <div class="input-wrapper">
                        <input type="text" wire:model="newMessage" placeholder="Type your message..."
                            class="text-input" id="messageInput">
                    </div>

                    <button type="submit" class="send-button">
                        Send
                    </button>
                </form>
            </div>

            <!-- Surprise div -->
            <div class="surprise hidden" id="surprise" style="display: none">
                <x-love-animation />
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
    @push('scripts')
        <script>
            const chatContainer = document.querySelector('.messages-container');

            function scrollToBottom() {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }


            scrollToBottom()
            document.addEventListener("DOMContentLoaded", function(event) {
                Echo.channel('chat.{{ $room->id }}')
                    .listen('.message.sent', (e) => {
                        scrollToBottom()
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
                    const intervalId = setInterval(createHeart, 100);


                    setTimeout(() => {
                        surprise.classList.add('hidden');
                        clearInterval(intervalId);
                        // Hapus semua elemen dengan class 'heart'
                        const hearts = document.querySelectorAll('.heart');
                        hearts.forEach(heart => heart.remove());
                    }, 3000);
                }
            }
        </script>
    @endpush
</x-filament-panels::page>
