<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- RUTE HALAMAN PUBLIK (FRONTEND) ---
$routes->get('/', 'Pages::index');
$routes->get('home', 'Pages::index'); // Alias jika masih diperlukan
$routes->get('about', 'Pages::about');
$routes->get('catalogue', 'Pages::catalogue');
$routes->get('blog', 'Pages::blog');
$routes->get('faq', 'Pages::faq'); // Halaman FAQ publik

// Jika Anda memiliki method detail di PagesController (opsional, uncomment jika perlu)
// $routes->get('blog/(:segment)', 'Pages::detailBlog/$1');
// $routes->get('catalogue/(:segment)', 'Pages::detailProduk/$1');


// --- RUTE OTENTIKASI (LOGIN, LOGOUT, UBAH PASSWORD) ---
// Diletakkan di luar grup 'admin' agar bisa diakses sebelum login
$routes->get('login', 'AuthController::login', ['as' => 'login']);
$routes->post('auth/attempt-login', 'AuthController::attemptLogin', ['as' => 'attempt.login']);
$routes->get('logout', 'AuthController::logout', ['as' => 'logout']);

// Rute untuk Ubah Password (Memerlukan login admin, jadi filter 'authadmin' diterapkan)
$routes->group('auth', ['namespace' => 'App\Controllers', 'filter' => 'authadmin'], static function ($routes) {
    $routes->get('change-password', 'AuthController::changePassword', ['as' => 'auth.change_password']);
    $routes->post('attempt-change-password', 'AuthController::attemptChangePassword', ['as' => 'auth.attempt_change_password']);
});


// --- GRUP RUTE ADMIN (SEMUA RUTE DI SINI AKAN MELALUI FILTER 'authadmin') ---
$routes->group('admin', ['namespace' => 'App\Controllers', 'filter' => 'authadmin'], static function ($routes) {
    $routes->get('/', 'AdminController::index', ['as' => 'admin.dashboard']); // Mengarah ke /admin
    $routes->get('dashboard', 'AdminController::index'); // Alias jika ingin /admin/dashboard

    // Blog Routes
    $routes->get('blog', 'AdminController::listBlog', ['as' => 'admin.blog.list']);
    $routes->get('blog/create', 'AdminController::createBlog', ['as' => 'admin.blog.create']);
    $routes->post('blog/save', 'AdminController::saveBlog', ['as' => 'admin.blog.save']);
    $routes->get('blog/edit/(:segment)', 'AdminController::editBlog/$1', ['as' => 'admin.blog.edit']);
    $routes->post('blog/update/(:num)', 'AdminController::updateBlog/$1', ['as' => 'admin.blog.update']);
    $routes->post('blog/delete/(:num)', 'AdminController::deleteBlog/$1', ['as' => 'admin.blog.delete_post']);

    // Catalogue Routes
    $routes->get('catalogue', 'AdminController::listCatalogue', ['as' => 'admin.catalogue.list']);
    $routes->get('catalogue/create', 'AdminController::createCatalogue', ['as' => 'admin.catalogue.create']);
    $routes->post('catalogue/save', 'AdminController::saveCatalogue', ['as' => 'admin.catalogue.save']);
    $routes->get('catalogue/edit/(:segment)', 'AdminController::editCatalogue/$1', ['as' => 'admin.catalogue.edit']);
    $routes->post('catalogue/update/(:num)', 'AdminController::updateCatalogue/$1', ['as' => 'admin.catalogue.update']);
    $routes->post('catalogue/delete/(:num)', 'AdminController::deleteCatalogue/$1', ['as' => 'admin.catalogue.delete_post']);

    // Review Routes
    $routes->get('review', 'AdminController::listReview', ['as' => 'admin.review.list']);
    $routes->get('review/create', 'AdminController::createReview', ['as' => 'admin.review.create']);
    $routes->post('review/save', 'AdminController::saveReview', ['as' => 'admin.review.save']);
    $routes->get('review/edit/(:num)', 'AdminController::editReview/$1', ['as' => 'admin.review.edit']);
    $routes->post('review/update/(:num)', 'AdminController::updateReview/$1', ['as' => 'admin.review.update']);
    $routes->post('review/delete/(:num)', 'AdminController::deleteReview/$1', ['as' => 'admin.review.delete_post']);

    // FAQ Routes
    $routes->get('faq', 'AdminController::listFaq', ['as' => 'admin.faq.list']); // Ini yang Anda coba akses
    $routes->get('faq/create', 'AdminController::createFaq', ['as' => 'admin.faq.create']);
    $routes->post('faq/save', 'AdminController::saveFaq', ['as' => 'admin.faq.save']);
    $routes->get('faq/edit/(:num)', 'AdminController::editFaq/$1', ['as' => 'admin.faq.edit']);
    $routes->post('faq/update/(:num)', 'AdminController::updateFaq/$1', ['as' => 'admin.faq.update']);
    $routes->post('faq/delete/(:num)', 'AdminController::deleteFaq/$1', ['as' => 'admin.faq.delete_post']);
});


// --- PENGATURAN ROUTE DEFAULT ---
// $routes->setDefaultController('Pages'); // Ini bisa Anda aktifkan jika Pages adalah controller default untuk '/'
// $routes->setDefaultMethod('index');

// Hapus atau komentari rute ini karena sudah ditangani oleh /admin
// $routes->get('admin', 'Pages::admin'); // <--- HAPUS ATAU KOMENTARI INI

// $routes->setAutoRoute(false); // Jika Anda ingin menonaktifkan auto-routing, pastikan semua rute sudah terdefinisi.
// Untuk development, setAutoRoute(true) kadang lebih mudah, tapi false lebih aman untuk produksi.
// Jika Anda sudah memiliki $routes->setAutoRoute(false); dari sebelumnya, biarkan saja.