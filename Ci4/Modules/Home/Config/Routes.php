<?php

namespace Modules\Home\Config;

/*
Attach a route for the Home controller at the correct namespace
$routes->group('',['namespace' => '\Modules\Home\Controllers'], function ($routes) {}
*/

/* Create a routes group for the Students module at the correct namespace */
$routes->group('',['namespace' => '\Modules\Home\Controllers'], function ($routes)
{
    //routes in this module
    $routes->match(['get', 'post'], '/', 'Home::index');
    $routes->match(['get', 'post'], 'docs', 'Home::docs');
    
});

