<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->setAutoRoute(false);   
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');

// Halaman Utama & Static Pages
$routes->get('/',          'Pages::index');
$routes->get('home',       'Pages::index');
$routes->get('about',      'Pages::about');
$routes->get('catalogue',  'Pages::catalogue');
$routes->get('blog',       'Pages::blog');
$routes->get('faq',        'Pages::faq');
$routes->get('admin',      'Pages::admin');

// Route tambahan (jika ada)
// $routes->post('contact/submit', 'Pages::submitContact');