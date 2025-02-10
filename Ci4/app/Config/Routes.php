<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index'); //this route is for the normal "Home" controller


/* Better to use $routes->match when there are both GET and POST requests */
//$routes->match(['GET','POST'],'/', 'Splash::index'); //show the splash page

//This is the default route for Home module only!
$routes->GET('/', '\Modules\Home\Controllers\Home::index');


service('auth')->routes($routes);
