<?php

namespace Modules\Result\Config;

/*
    Without necessarily needing to add a prefix to the group, you can pass an empty string in place of the
    prefix and the routes in the group will be routed as though the group never existed but with the given route
    config options:
*/

//e.g this is the routes group for the Quiz module at the specified namespace
$routes->group('',['namespace' => '\Modules\Result\Controllers'], static function ($routes)
{
    //All of the routes need for this modul
$routes->match(['GET','POST'],'result/delete/(:num)', 'Result::delete/$1');//delete a student result
$routes->match(['GET','POST'],'result/index', 'Result::index'); //show the results page

});
