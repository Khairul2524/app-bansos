<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->add('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');

// user
$routes->get('/user', 'User::index');
$routes->add('/user/add', 'User::tambah');
$routes->add('/user/edit', 'User::ubah');
$routes->add('/user/update', 'User::update');
$routes->get('/user/(:segment)/delete', 'User::hapus/$1');

// level
$routes->get('/level', 'Level::index');
$routes->add('/level/add', 'Level::tambah');
$routes->add('/level/edit', 'Level::ubah');
$routes->add('/level/update', 'Level::update');
$routes->get('/level/(:segment)/delete', 'Level::hapus/$1');

// Kriteia
$routes->get('/kriteria', 'Kriteria::index');
$routes->add('/kriteria/add', 'Kriteria::tambah');
$routes->add('/kriteria/edit', 'Kriteria::ubah');
$routes->add('/kriteria/update', 'Kriteria::update');
$routes->get('/kriteria/(:segment)/delete', 'Kriteria::hapus/$1');

// Bobot
$routes->get('/bobot', 'Bobot::index');
$routes->add('/bobot/add', 'Bobot::tambah');
$routes->add('/bobot/edit', 'Bobot::ubah');
$routes->add('/bobot/update', 'Bobot::update');
$routes->get('/bobot/(:segment)/delete', 'Bobot::hapus/$1');

// Penduduk
$routes->get('/penduduk', 'Penduduk::index');
$routes->add('/penduduk/add', 'Penduduk::tambah');
$routes->add('/penduduk/form', 'Penduduk::form');
$routes->add('/penduduk/edit', 'Penduduk::ubah');
$routes->add('/penduduk/update', 'Penduduk::update');
$routes->get('/penduduk/(:segment)/delete', 'Penduduk::hapus/$1');

// Perhitungan
$routes->get('/perhitungan', 'Perhitungan::index');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
