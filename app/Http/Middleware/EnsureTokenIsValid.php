<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    public function handle(Request $request, Closure $next): Response
    {
        $authHeader = $request->header('Authorization');

        if (! $authHeader || ! str_starts_with($authHeader, 'Bearer ')) {
            return response()->json(['message' => 'Unauthorized. Bearer token missing or malformed.'], 401);
        }

        $token = trim(str_replace('Bearer ', '', $authHeader));

        if (empty($token)) {
            return response()->json(['message' => 'Unauthorized. Token is empty.'], 401);
        }

        return $next($request);
    }
}
