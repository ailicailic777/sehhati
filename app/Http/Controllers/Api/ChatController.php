<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $conversations = Conversation::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->with('sender', 'receiver')
            ->orderBy('last_message_at', 'desc')
            ->get();

        return response()->json($conversations);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
        ]);

        $userId = $request->user()->id;

        $conversation = Conversation::firstOrCreate([
            'sender_id' => $userId,
            'receiver_id' => $validated['receiver_id'],
        ], [
            'last_message_at' => now(),
        ]);

        return response()->json($conversation, 201);
    }

    public function messages(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);

        $messages = $conversation->messages()
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();

        Message::where('conversation_id', $id)
            ->where('sender_id', '!=', $request->user()->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json($messages);
    }

    public function sendMessage(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $message = $conversation->messages()->create([
            'sender_id' => $request->user()->id,
            'content' => $validated['content'],
        ]);

        $conversation->update(['last_message_at' => now()]);

        return response()->json($message, 201);
    }
}
