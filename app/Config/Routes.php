<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->setAutoRoute(true);
$routes->get('/companycontroller', 'CompanyController::index');
$routes->get('/pages','Pages::index');
// Route untuk Halaman Website
