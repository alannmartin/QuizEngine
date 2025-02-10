<?php

//this is the route for the Templates module
$routes->group('', ['namespace' => '\Modules\Templates\Controllers'], static function($routes)
{
	//sub routes in this module
	$routes->match(['get', 'post'], '/', 'Templates::index');

});