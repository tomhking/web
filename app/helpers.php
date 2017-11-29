<?php

if (!function_exists('asset_rev')) {
    /**
     * Returns asset url based on given path
     * @param $path
     * @return string
     */
    function asset_rev($path)
    {
        $buildNumberFile = base_path('build-number.txt');
        $version = trim(file_exists($buildNumberFile) ? "?static=true&v=" . file_get_contents($buildNumberFile) : "");
        return base('assets/' . $path) . $version;
    }
}

if (!function_exists('language_prefix')) {
    /**
     * Returns current language key
     *
     * @return string
     */
    function language_prefix()
    {
        /**
         * @var \Illuminate\Http\Request $request
         */
        $request = app()->make('request');
        $languages = app()->make('languages');

        $languageFromSegment = $request->segment(1, 'en');
        config()->set('app.locale', isset($languages[$languageFromSegment]) ? $languageFromSegment : config('app.fallback_locale'));

        return config('app.locale');
    }
}

if (!function_exists('base')) {
    /**
     * Returns path relative to base URL
     *
     * @param $path
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function base($path = '/')
    {
        return url(env('BASE_PATH', '/') . $path);
    }
}

if (!function_exists('current_route_class')) {
    /**
     * Prints out the given string if current route matches the given route name
     *
     * @param $route
     * @param string $class
     * @return string
     */
    function current_route_class($route, $class = 'active')
    {
        $instance = request()->route();

        if ($instance instanceof \Illuminate\Routing\Route && $instance->getName() == $route) {
            return $class;
        }

        return '';
    }
}