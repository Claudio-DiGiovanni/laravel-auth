<?php

namespace App\Http\Controllers\Admin;

use OpenAI\OpenAI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    public function generateText(Request $request) {
        // Creare una nuova istanza di OpenAI
        $openai = new OpenAI(env('OPENAI_SECRET'));

        // Recuperare i parametri dalla richiesta
        $prompt = $request->input('prompt');
        $model = $request->input('model', 'text-davinci-002');

        // Inviare la richiesta all'API OpenAI
        $response = $openai->engines()->generate(
            $model,
            $prompt,
            [
                'max_tokens' => $request->input('max_tokens', 100)
            ]
        );

        // Recuperare il testo generato dalla risposta
        $generated_text = $response->get('choices')[0]['text'];

        // Restituire il testo generato
        return response()->json(['generated_text' => $generated_text]);
    }
}

