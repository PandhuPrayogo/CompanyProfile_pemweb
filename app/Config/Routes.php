<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/**
 * @var RouteCollection $routes
 */
$routes->get('/produk', 'Produk::daftar');