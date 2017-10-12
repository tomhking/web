<?php

namespace App\Http\Middleware;

use App\AuthToken;
use Closure;

class CookieAuthMiddleware
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
                view()->share([
                    'authenticated' => true,
                    'participant' => $token->participant,
                ]);

                return $next($request);
            }
        }

        view()->share([
            'authenticated' => false,
            'participant' => null,
        ]);

        return $next($request);
    }
}
