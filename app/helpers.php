<?php

if (!function_exists('asset')) {
    /**
     * Returns asset url based on given path
     * @param $path
     * @return string
     */
    function asset($path)
    {
        return base('assets/' . $path);
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