<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    private $fallbackLanguage = 'en';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = $request->segment(1);
        $supportedLanguages = app('languages');

        if (!isset($supportedLanguages[$language])) {
            abort(404);
        }

        ksort($supportedLanguages);

        view()->share([
            'languages' => $supportedLanguages,
            'currentLanguage' => $language,
            'defaultLanguage' => $this->fallbackLanguage,
        ]);

        /**
         * @var \Illuminate\Translation\Translator $translator
         */
        $translator = app()->make('translator');
        $translator->setLocale($language);
        $translator->setFallback($this->fallbackLanguage);

        return $next($request);
    }
}
