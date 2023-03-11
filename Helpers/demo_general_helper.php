<?php

/**
 * link the css files 
 * 
 * @param array $array
 * @return print css links
 */
if (!function_exists('demo_load_css')) {
    function demo_load_css(array $array)
    {
        foreach ($array as $uri) {
            echo "<link rel='stylesheet' type='text/css' href='" . base_url(PLUGIN_URL_PATH . "Demo/$uri") . "' />";
        }
    }
}
