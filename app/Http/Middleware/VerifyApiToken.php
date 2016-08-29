<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class VerifyApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request hold request from user
     * @param \Closure                 $next    next request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::toUser($request->header('Authorization'));
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['response'=> \Config::get('http_response_code.INVALID_TOKEN')]);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['response'=> \Config::get('http_response_code.EXPIRED_TOKEN')]);
            } else {
                return response()->json(['response'=> \Config::get('http_response_code.ERROR_ACTION')]);
            }
        }
        return $next($request);
    }
}
