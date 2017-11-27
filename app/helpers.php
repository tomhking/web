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
        return url('assets/' . $path) . $version;
    }
}

if (!function_exists('language_prefix')) {
    /**
     * Returns current language key
     *
     * @param $name
     * @param array $parameters
     * @param null $secure
     * @return string
     */
    function language_prefix($name, $parameters = [], $secure = null)
    {
        /**
         * @var \Illuminate\Http\Request $request
         */
        $request = app()->make('request');
        $languages = app()->make('languages');

        $languageFromSegment = $request->segment(1, 'en');
        config()->set('app.locale', isset($languages[$languageFromSegment]) ? $languageFromSegment : config('app.fallback_locale'));
    }
}
