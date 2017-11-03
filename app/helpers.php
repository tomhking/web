<?php

if (!function_exists('asset')) {
    /**
     * Returns asset url based on given path
     * @param $path
     * @return string
     */
    function asset($path)
    {
        $buildNumberFile = base_path('build-number.txt');
        $version = trim(file_exists($buildNumberFile) ? "?v=" . file_get_contents($buildNumberFile) : "");
        return base('assets/' . $path) . $version;
    }
}

if (!function_exists('base')) {
    /**
     * Returns absolute URL to a given path
     * @param string $path
     * @return string
     */
    function base($path = '')
    {
        return app('url')->to(getenv('BASE_PATH', '/')) . '/' . ltrim($path, '/');
    }
}

if (!function_exists('route_lang')) {
    /**
     * Returns URL to a given named route. Appends language parameter.
     *
     * @param $name
     * @param array $parameters
     * @param null $secure
     * @return string
     */
    function route_lang($name, $parameters = [], $secure = null)
    {
        /**
         * @var \Illuminate\Http\Request $request
         */
        $request = app()->make('request');

        return rtrim(str_replace(['[',']',], '', route($name, array_merge([
            'lang' => $parameters['lang'] ?? $request->segment(1, 'en'),
        ], $parameters), $secure)), '/');
    }
}