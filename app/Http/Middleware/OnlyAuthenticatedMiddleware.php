<?php

namespace App\Http\Middleware;

use App\AuthToken;
use Closure;

class OnlyAuthenticatedMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = $request->cookie('auth');

        if (!empty($key)) {
            $token = AuthToken::byKey($key)->first();

            if ($token instanceof AuthToken && $token->canAuthenticate()) {
                return $next($request);
            }
        }

        return redirect(route_lang('login'));
    }
}
