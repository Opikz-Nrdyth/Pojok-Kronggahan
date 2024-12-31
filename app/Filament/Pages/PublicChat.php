<?php
// app/Filament/Pages/PublicChat.php
namespace App\Filament\Pages;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class PublicChat extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static string $view = 'filament.pages.public-chat';
    protected static ?string $navigationGroup = "Service";
    protected static bool $shouldCache = false;


    public $messages = [];
    public $newMessage = '';
    public $room;

    protected $listeners = ['messageReceived' => 'loadMessage'];


    public function mount()
    {
        // Fetch or create the public chat room
        $this->room = ChatRoom::firstOrCreate(
            ['type' => 'public'],
            ['name' => 'Public Chat', 'user_id' => Auth::id() ?? 1]
        );


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
        if (empty(trim($this->newMessage))) {
            return;
        }

        $message = ChatMessage::create([
            'chat_room_id' => $this->room->id,
            'user_id' => Auth::id() ?? 1,
            'message' => $this->newMessage,
        ]);

        broadcast(new \App\Events\MessageSent($message));

        $this->loadMessage();
        $this->newMessage = '';
    }
}
