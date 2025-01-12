<?php

namespace App\Http\Middleware;

use App\Support\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;

class AccessUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        abort_if(optional($request->user)->type != RoleEnum::USER,404);
        return $next($request);
    }
}
