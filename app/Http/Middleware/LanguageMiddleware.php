<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware
{
    private $fallbackLanguage = 'en';
    private $supportedLanguages = [
        'en' => 'EN',
        'cn' => 'CN',
        'ru' => 'RU',
        'lv' => 'LV',
        'ro' => 'RO',
        'tr' => 'TR',
        'fr' => 'FR',
        'vn' => 'VN',
        'es' => 'ES',
        'id' => 'ID',
        'gt' => 'GR',
        'it' => 'IT',
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

        ksort($this->supportedLanguages);

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
