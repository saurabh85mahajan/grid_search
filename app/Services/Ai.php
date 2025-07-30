<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Ai
{
    private $login;
    private $password;
    
    public function __construct()
    {
        $this->login = config('services.ai.key');
        $this->password = config('services.ai.password');
    }

    /**
     * General method to ask AI for a response
     *
     * @param string $systemInstruction The system instruction
     * @param string $userQuestion The user question
     * @param string $model The model to use
     * @return mixed The AI response
     */
    public function ask($systemInstruction, $userQuestion, $model = 'llama3.2:3b')
    {
        $fullPrompt = $systemInstruction . "\n\nUser query: " . $userQuestion;

        $response = Http::timeout(60)
            ->withBasicAuth($this->login, $this->password)
            ->acceptJson()
            ->contentType('application/json')
            ->post('https://aiwebdesk.com/api/generate', [
                'model' => $model,
                'stream' => false,
                'prompt' => $fullPrompt,
            ]);

        if ($response->successful()) {
            $result = $response->json();
            return $result['response'] ?? null;
        }

        Log::error("AI API Error: " . $response->status() . " - " . $response->body());
        return null;
    }
}