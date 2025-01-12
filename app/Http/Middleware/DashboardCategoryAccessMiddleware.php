<?php

namespace App\Http\Middleware;

use App\Support\Enums\RoleEnum;
use Closure;
use Illuminate\Http\Request;

class DashboardCategoryAccessMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user->hasRole(RoleEnum::ORGANIZATION))
            abort_if(optional($request->category)->organization_id != $user->organization_id,404);
        elseif ($user->hasRole(RoleEnum::USER))
            abort(404);

        return $next($request);
    }
}
