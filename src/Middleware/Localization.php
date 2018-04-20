<?php

namespace Hoyvoy\Localization\Middleware;

use Closure;
use Hoyvoy\Localization\Facades\Localize;
use Hoyvoy\Localization\Facades\Router;
use Illuminate\Http\RedirectResponse;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Localize::shouldRedirect()) {
            return new RedirectResponse(Router::getRedirectURL(), 302, ['Vary', 'Accept-Language']);
        }

        return $next($request);
    }
}
