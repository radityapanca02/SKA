<?php

namespace App\Http\Controllers;

use App\Services\GeminiChatService;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    protected $chatbot;

    public function __construct(GeminiChatService $chatbot)
    {
        $this->chatbot = $chatbot;
    }

    public function ask(Request $request)
    {
        $request->validate(['message' => 'required|string|max:500']);
        $reply = $this->chatbot->ask($request->message);
        return response()->json(['reply' => $reply]);
    }
}
