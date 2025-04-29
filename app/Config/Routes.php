<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->setAutoRoute(true);
$routes->get('home/index', 'Home::index');
$routes->get('home/coba', 'Home::coba/$1');
