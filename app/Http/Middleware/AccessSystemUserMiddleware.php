<?php

namespace App\Http\Middleware;

use App\Support\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;

class AccessSystemUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        abort_if(!in_array(optional($request->user)->type,[RoleEnum::MODERATOR,RoleEnum::ADMIN]),404);
        return $next($request);
    }
}
