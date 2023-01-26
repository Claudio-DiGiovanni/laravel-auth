<?php

namespace App\Http\Controllers\Admin;

use OpenAI\Client as OpenAI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    public function generateText(Request $request) {
        $url = 'https://api.openai.com/v1/engines/davinci/completions';
        $prompt = $request->input('prompt');
        $data = [
            'prompt' => $prompt,
            'max_tokens' => $request->input('max_tokens', 100),
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer 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'
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if($httpCode != 200) {
            echo "Error: " . curl_error($curl);
        }
        curl_close($curl);
        $response = json_decode($response, true);
        $generated_text = $response['choices'][0]['text'];
        return response()->json(['generated_text' => $generated_text]);
    }
}
