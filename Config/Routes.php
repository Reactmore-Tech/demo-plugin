<?php

namespace Config;

$routes = Services::routes();

$routes->group('admin', ['namespace' => 'Demo\Controllers'], function ($routes) {
    $routes->get('demo', 'Demo::index');
    $routes->get('demo/demo-settings', 'DemoSettings::index');
});
