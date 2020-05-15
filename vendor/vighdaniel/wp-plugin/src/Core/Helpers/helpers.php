<?php

use WpPlugin\Core\Classes\PluginWrapper;

if (! function_exists('plugin')) {
    
    /**
     * app
     *
     * @param  string|null  $property
     * @param  array   $parameters
     * @return mixed|\WpPlugin\Core\Classes\PluginWrapper
     */
    function plugin(string $property = null, array $parameters = [])
    {
        if (!$property) return PluginWrapper::getInstance();

        return PluginWrapper::getInstance()->make($property, $parameters);
    }
    
}

if (! function_exists('base_path')) {

    /**
     * base_path
     *
     * @param  string  $path
     * @return string
     */
    function base_path(string $path = '')
    {
        return plugin()->basePath() . ($path ? DS . $path : $path);
    }

}

if (! function_exists('config_path')) {

    /**
     * base_path
     *
     * @param  string  $path
     * @return string
     */
    function config_path(string $path = '')
    {
        return plugin()->configPath() . ($path ? DS . $path : $path);
    }

}

if (! function_exists('config')) {

    /**
     * config : accepts a string parameter which
     * defines what the function should return
     * for example: 'plugin.hooks.actions' will return
     * all the actions from that array.
     *
     * @param  string  $depth
     * @return array
     */
    function config(string $depth = '')
    {
        $depth = explode(".", $depth);
        $config = require(config_path() . DS . $depth[0] . '.php');
        $counter = 0;
        foreach($depth as $key) {
            if( $counter != 0 ) {
                $config = $config[$key];
            }

            $counter++;
        }
        return $config;
    }

}

if (! function_exists('plugin_name')) {

    function plugin_name()
    {
        return config('plugin.name');
    }

}

if (! function_exists('slug')) {

    function slug(string $text = '')
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}