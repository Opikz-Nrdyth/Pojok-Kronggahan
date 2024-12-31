<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class LiveChat extends Component
{
    use WithFileUploads;

    public $messages = [];
    public $newMessage = '';
    public $room;
    public $title;
    public $attachment = null;

    protected $listeners = ['messageReceived' => 'loadMessage'];

    public function mount()
    {
        if ($this->title == "Public Chat") {
            // Fetch or create the public chat room
            $this->room = ChatRoom::firstOrCreate(
                ['type' => 'public'],
                ['name' => 'Public Chat', 'user_id' => Auth::id() ?? 1]
            );
        } else {
            // Fetch or create the public chat room
            $this->room = ChatRoom::firstOrCreate(
                ['type' => 'service', 'name' => Auth::user()->name],
                ['user_id' => Auth::id() ?? 1]
            );
        }

        $this->loadMessage();
    }

    public function loadMessage()
    {
        $this->messages = ChatMessage::where('chat_room_id', $this->room->id)
            ->with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();
    }

    public function sendMessage()
    {
        if (empty(trim($this->newMessage)) && $this->attachment == null) {
            return;
        }

        if ($this->attachment) {
            $path = $this->attachment->store('chat-files', 'public');
            $message = ChatMessage::create([
                'chat_room_id' => $this->room->id,
                'user_id' => auth()->id(),
                'message' => $this->newMessage,
                'file_path' => $path,
                'file_name' => $this->attachment->getClientOriginalName(),
                'mime_type' => $this->attachment->getMimeType(),
            ]);
            $this->attachment = null;
        } else {
            $message = ChatMessage::create([
                'chat_room_id' => $this->room->id,
                'user_id' => Auth::id() ?? 1,
                'message' => $this->newMessage,
            ]);
        }

        broadcast(new \App\Events\MessageSent($message));

        $this->loadMessage();
        $this->newMessage = '';
    }

    public function render()
    {
        return view('livewire.live-chat');
    }
}
