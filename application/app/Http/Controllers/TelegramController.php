<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validate request data
        $request->validate([
            'chat_id' => 'required|string',
            'message' => 'required|string',
        ]);

        $chat_id = env('USER_CHAT_ID') ?? $request->input('chat_id');
        $message = $request->input('message');
        $token = env('TELEGRAM_BOT_TOKEN');

        if (!$chat_id || !$token) {
            Log::error('Missing configuration', [
                'chat_id' => $chat_id,
                'token' => $token,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Chat ID or Telegram bot token is missing.',
            ], 500);
        }

        // Send the request to Telegram
        $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chat_id,
            'text' => $message,
        ]);

        // dd('TELEGRAM BOT TOKEN: '. $token);
        // dd('[TELEGRAM BOT TOKEN] => ' . $token . ' ' . print_r($request->all(), true));

        // Log response details
        Log::info('Telegram API Response', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if ($response->failed()) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message.',
                'error' => $response->json(),
            ], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!',
        ]);
    }
}
