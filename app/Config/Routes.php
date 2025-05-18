<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute untuk Halaman Publik (Frontend)
$routes->get('/', 'Pages::index'); // Halaman utama
$routes->get('/pages/home', 'Pages::index'); // Alias untuk home jika masih digunakan
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/catalogue', 'Pages::catalogue');
$routes->get('/pages/blog', 'Pages::blog');
$routes->get('/pages/faq', 'Pages::faq');

// Jika Anda punya method detail di PagesController (seperti yang saya contohkan sebelumnya)
// $routes->get('/blog/(:segment)', 'Pages::detailBlog/$1');
// $routes->get('/catalogue/(:segment)', 'Pages::detailProduk/$1');

// Rute untuk Login & Logout (di luar grup admin agar bisa diakses tanpa login)
$routes->get('login', 'AuthController::login', ['as' => 'login']);
$routes->post('auth/attempt-login', 'AuthController::attemptLogin', ['as' => 'attempt.login']);
$routes->get('logout', 'AuthController::logout', ['as' => 'logout']);

// Rute untuk Ubah Password (Memerlukan login admin, jadi gunakan filter 'authadmin')
$routes->group('auth', ['namespace' => 'App\Controllers', 'filter' => 'authadmin'], static function ($routes) {
    $routes->get('change-password', 'AuthController::changePassword', ['as' => 'auth.change_password']);
    $routes->post('attempt-change-password', 'AuthController::attemptChangePassword', ['as' => 'auth.attempt_change_password']);
});

// Grup Rute Admin (Semua rute di sini akan melalui filter 'authadmin')
$routes->group('admin', ['namespace' => 'App\Controllers', 'filter' => 'authadmin'], static function ($routes) {
    $routes->get('/', 'AdminController::index', ['as' => 'admin.dashboard']); // Mengarah ke /admin
    $routes->get('dashboard', 'AdminController::index'); // Alias jika ingin /admin/dashboard

    // Blog Routes
    $routes->get('blog', 'AdminController::listBlog', ['as' => 'admin.blog.list']);
    $routes->get('blog/create', 'AdminController::createBlog', ['as' => 'admin.blog.create']);
    $routes->post('blog/save', 'AdminController::saveBlog', ['as' => 'admin.blog.save']);
    $routes->get('blog/edit/(:segment)', 'AdminController::editBlog/$1', ['as' => 'admin.blog.edit']);
    $routes->post('blog/update/(:num)', 'AdminController::updateBlog/$1', ['as' => 'admin.blog.update']);
    // Gunakan POST untuk delete dengan _method='DELETE' di form
    $routes->post('blog/delete/(:num)', 'AdminController::deleteBlog/$1', ['as' => 'admin.blog.delete_post']);

    // Catalogue Routes
    $routes->get('catalogue', 'AdminController::listCatalogue', ['as' => 'admin.catalogue.list']);
    $routes->get('catalogue/create', 'AdminController::createCatalogue', ['as' => 'admin.catalogue.create']);
    $routes->post('catalogue/save', 'AdminController::saveCatalogue', ['as' => 'admin.catalogue.save']);
    $routes->get('catalogue/edit/(:segment)', 'AdminController::editCatalogue/$1', ['as' => 'admin.catalogue.edit']);
    $routes->post('catalogue/update/(:num)', 'AdminController::updateCatalogue/$1', ['as' => 'admin.catalogue.update']);
    // Gunakan POST untuk delete dengan _method='DELETE' di form
    $routes->post('catalogue/delete/(:num)', 'AdminController::deleteCatalogue/$1', ['as' => 'admin.catalogue.delete_post']);

     // Review Routes
    $routes->get('review', 'AdminController::listReview', ['as' => 'admin.review.list']);
    $routes->get('review/create', 'AdminController::createReview', ['as' => 'admin.review.create']);
    $routes->post('review/save', 'AdminController::saveReview', ['as' => 'admin.review.save']);
    $routes->get('review/edit/(:num)', 'AdminController::editReview/$1', ['as' => 'admin.review.edit']); // Menggunakan ID untuk edit
    $routes->post('review/update/(:num)', 'AdminController::updateReview/$1', ['as' => 'admin.review.update']);
    $routes->post('review/delete/(:num)', 'AdminController::deleteReview/$1', ['as' => 'admin.review.delete_post']);
});

// Hapus rute '/pages/admin' yang lama jika sudah tidak digunakan
// $routes->get('/pages/admin','Pages::admin'); // Komentari atau hapus baris ini

// setAutoRoute(true) bisa berguna saat development awal, tapi false lebih aman untuk produksi.
// Jika Anda set false, pastikan SEMUA rute yang Anda butuhkan sudah terdefinisi di atas.
// Untuk sekarang, kita bisa biarkan auto route default (true) atau jika Anda sudah set false, pastikan semua rute admin tercakup.
// $routes->setAutoRoute(true); // Jika Anda ingin mengaktifkan auto routing sementara untuk debugging, tapi hati-hati.
// Jika Anda sudah punya: $routes->setAutoRoute(false); /*alasan keamanan*/ , maka pastikan semua sudah terdefinisi.
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
