<x-filament-panels::page>
    <style>
        .chat-container {
            display: flex;
            height: 70vh;
            gap: 16px;
        }

        .rooms-sidebar {
            width: 25%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 16px;
        }

        .rooms-title {
            font-weight: 500;
            margin-bottom: 16px;
        }

        .rooms-list {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .room-button {
            width: 100%;
            text-align: left;
            padding: 8px;
            border-radius: 4px;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .room-button:hover {
            background: #f9f9f9;
        }

        .active-room {
            background: #eef7ff;
        }

        .room-name {
            font-weight: 500;
        }

        .room-time {
            font-size: 12px;
            color: #6b7280;
        }

        .chat-area {
            flex: 1;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .chat-wrapper {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .messages {
            flex: 1;
            padding: 16px;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 16px;
            max-width: 70%;
        }

        .message-own {
            margin-left: auto;
        }

        .message-content {
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .message-own-content {
            background: #e0f7fa;
        }

        .message-other-content {
            background: #f3f4f6;
        }

        .message-user {
            font-weight: 500;
            font-size: 12px;
        }

        .message-body {
            margin-top: 4px;
        }

        .message-file {
            color: #0288d1;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .message-file:hover {
            text-decoration: underline;
        }

        .message-time {
            margin-top: 4px;
            font-size: 10px;
            color: #6b7280;
        }

        .input-area {
            border-top: 1px solid #e5e7eb;
            padding: 16px;
        }

        .input-form {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .input-file {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .file-input {
            display: none;
        }

        .file-label {
            cursor: pointer;
            color: #0288d1;
            font-size: 14px;
        }

        .file-name {
            font-size: 12px;
            color: #6b7280;
        }

        .input-box {
            display: flex;
            gap: 8px;
        }

        .text-input {
            flex: 1;
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

        .no-chat {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #6b7280;
        }
    </style>
    <div class="chat-container">
        <!-- Rooms Sidebar -->
        <div class="rooms-sidebar">
            <h3 class="rooms-title">Customer Service Chats</h3>
            <div class="rooms-list" wire:poll.30s="fetchRooms">
                @foreach ($rooms as $room)
                    <button wire:click="selectRoom({{ $room->id }})"
                        class="room-button {{ $currentRoom?->id === $room->id ? 'active-room' : '' }}">
                        <div class="room-name">{{ $room->user?->name ?? 'Anonymous' }}</div>
                        <div class="room-time">
                            {{ $room->messages->last()?->created_at->diffForHumans() ?? 'No messages' }}
                        </div>
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Chat Area -->
        <div class="chat-area">
            @if ($currentRoom)
                <div class="chat-wrapper">
                    <!-- Messages -->
                    <div class="messages">
                        @foreach ($messages as $message)
                            <div class="message {{ $message->user_id === auth()->id() ? 'message-own' : '' }}">
                                <div
                                    class="message-content {{ $message->user_id === auth()->id() ? 'message-own-content' : 'message-other-content' }}">
                                    <div class="message-user">{{ $message->user->name }}</div>
                                    <div class="message-body">
                                        @if ($message->file_path)
                                            <img src="{{ config('app.url') }}/storage/{{ $message->file_path }}"
                                                alt="{{ $message->file_path }}" width="100%">
                                            <a href="{{ Storage::url($message->file_path) }}" target="_blank"
                                                class="message-file">
                                                <span class="file-icon"></span>
                                                {{ $message->file_name }}
                                            </a>
                                        @endif
                                        {{ $message->message }}
                                    </div>
                                    <div class="message-time">{{ $message->created_at->format('H:i') }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Input Area -->
                    <div class="input-area">
                        <form wire:submit="sendMessage" class="input-form">
                            <div class="input-file">
                                <input type="file" wire:model="attachment" id="file-upload" class="file-input">
                                <label for="file-upload" class="file-label">Upload File</label>
                                @if ($attachment)
                                    <div class="file-name">{{ $attachment->getClientOriginalName() }}</div>
                                @endif
                            </div>

                            <div class="input-box">
                                <input type="text" wire:model="newMessage" placeholder="Type your message..."
                                    class="text-input">
                                <button type="submit" class="send-button">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="no-chat">Select a chat to start messaging</div>
            @endif
        </div>
    </div>
    @vite('resources/js/app.js')
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                const chatContainer = document.querySelector('.messages');

                function scrollToBottom() {
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                }

                scrollToBottom()
                @if ($currentRoom)
                    Echo.channel('chat.{{ $currentRoom->id }}')
                        .listen('.message.sent', (e) => {
                            scrollToBottom()
                            @this.call('loadMessage', e.message);
                        });
                @endif
            });
        </script>
    @endpush
</x-filament-panels::page>
