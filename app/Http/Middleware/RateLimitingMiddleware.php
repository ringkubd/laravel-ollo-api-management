<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RateLimitingMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('Authorization');

        if (!$apiKey) {
            return response()->json(['message' => 'API key is missing'], 401);
        }

        $rateLimit = config('services.rate_limit');
        $key = 'rate_limit:' . $apiKey;
        $requests = Cache::get($key, 0);

        if ($requests >= $rateLimit) {
            return response()->json(['message' => 'Rate limit exceeded'], 429);
        }

        Cache::put($key, $requests + 1, now()->addMinute());

        return $next($request);
    }
}
