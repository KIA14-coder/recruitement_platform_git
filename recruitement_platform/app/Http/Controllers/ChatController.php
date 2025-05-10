<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function message(Request $request)
    {
        $userMessage = $request->input('message');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('GEMINI_API_KEY'),
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . env('GEMINI_API_KEY'), [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $userMessage]
                    ]
                ]
            ]
        ]);

        if (!$response->successful()) {
            return response()->json([
                'reply' => 'Erreur avec Gemini API.',
                'error' => $response->body()
            ], 500);
        }

        $data = $response->json();

        return response()->json([
            'reply' => $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Réponse vide de Gemini.'
        ]);
    }
}
