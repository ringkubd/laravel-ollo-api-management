<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggingMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        Log::info('Request Log', [
            'method' => $request->method(),
            'url' => $request->url(),
            'status' => $response->status(),
            'ip' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return $response;
    }
}
