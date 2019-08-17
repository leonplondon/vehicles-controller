<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticatedUserMiddleware
{
    public function handle($request, Closure $next)
    {
        $authenticated = $request
            ->session()
            ->get('authenticated', false);

        if (!$authenticated) {
            return redirect('forbidden');
        }

        return $next($request);
    }
}
