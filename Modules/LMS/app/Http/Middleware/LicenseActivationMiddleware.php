<?php

namespace Modules\LMS\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class LicenseActivationMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Pour l'instant, on suppose que la licence est activée
        return $next($request);
    }
}
