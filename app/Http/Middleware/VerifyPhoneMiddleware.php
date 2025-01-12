<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyPhoneMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->hasVerifiedPhone())
            return $next($request);
        else
            return redirect()->route('auth.verification.show');
    }
}
