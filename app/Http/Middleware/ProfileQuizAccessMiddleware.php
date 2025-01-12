<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileQuizAccessMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
