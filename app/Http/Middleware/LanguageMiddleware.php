<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    private $fallbackLanguage = 'en';
    private $supportedLanguages = [
        'en' => 'EN',
        'ch' => 'CH',
        'ru' => 'RU',
    ];

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

        if (!isset($this->supportedLanguages[$language])) {
            abort(404);
        }

        view()->share([
            'languages' => $this->supportedLanguages,
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
