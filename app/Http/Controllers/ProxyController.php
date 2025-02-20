<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use ArdaGnsrn\Ollama\Ollama;

class ProxyController extends Controller
{
    protected Ollama $ollama;
    public function __construct()
    {
        $this->ollama = Ollama::client();
    }
    public function generate(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string',
        ]);

        try {
            $response = $this->ollama->completions()->create([
                'model' => 'phi3:mini',
                'prompt' => $request->prompt,
            ]);
            return response()->json($response->toArray(), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while processing your request'], 500);
        }
    }
}
