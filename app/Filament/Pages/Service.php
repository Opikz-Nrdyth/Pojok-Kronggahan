<?php
// app/Filament/Pages/Service.php
namespace App\Filament\Pages;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Service extends Page
{
    use WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static string $view = 'filament.pages.service';
    protected static ?string $navigationGroup = "Service";

    public $currentRoom = null;
    public $messages = [];
    public $newMessage = '';
    public $attachment = null;
    public $rooms = [];

    protected $listeners = ['messageReceived' => 'loadMessage'];

    public function mount()
    {
        $this->rooms = ChatRoom::where('type', 'service')
            ->with('user')
            ->latest()
            ->get();
    }

    public function fetchRooms()
    {
        $this->rooms = ChatRoom::where('type', 'service')
            ->with('user')
            ->latest()
            ->get();
    }

    public function selectRoom($roomId)
    {
        $this->currentRoom = ChatRoom::findOrFail($roomId);
        $this->loadMessage();
    }

    public function loadMessage()
    {
        if (!$this->currentRoom) return;


        $this->messages = ChatMessage::where('chat_room_id', $this->currentRoom->id)
            ->with('user')
            ->latest()
            ->limit(50)
            ->get()
            ->reverse()
            ->values();
    }

    public function sendMessage()
    {
        if (!$this->currentRoom) return;

        if ($this->attachment) {
            $path = $this->attachment->store('chat-files', 'public');

            $message = ChatMessage::create([
                'chat_room_id' => $this->currentRoom->id,
                'user_id' => auth()->id(),
                'message' => $this->newMessage,
                'file_path' => $path,
                'file_name' => $this->attachment->getClientOriginalName(),
                'mime_type' => $this->attachment->getMimeType(),
            ]);

            broadcast(new \App\Events\MessageSent($message));
            $this->attachment = null;
        } else if ($this->newMessage) {
            $message = ChatMessage::create([
                'chat_room_id' => $this->currentRoom->id,
                'user_id' => auth()->id(),
                'message' => $this->newMessage,
            ]);
            broadcast(new \App\Events\MessageSent($message));
        }

        $this->newMessage = '';
        $this->loadMessage();
    }
}
