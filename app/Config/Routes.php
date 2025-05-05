    <?php

    use CodeIgniter\Router\RouteCollection;

    /**
     * @var RouteCollection $routes
     */
    $routes->get('/', 'Pages::index');
    $routes->setAutoRoute(true);
    $routes->get('/pages','Pages::index');
    $routes->get('/pages/about','Pages::about');
    $routes->get('/pages/catalogue','Pages::catalogue');
    $routes->get('/pages/blog','Pages::blog');
    $routes->get('/pages/faq','Pages::faq');
    $routes->get('/pages/admin','Pages::admin');
    // Route untuk Halaman Website
