<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->hasHeader('X-header')) {
            return $next($request);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized Access'], 404);
        }
    }
}
