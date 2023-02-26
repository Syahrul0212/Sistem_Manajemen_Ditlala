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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/room', 'Home::room');
$routes->get('/', 'Auth::login');
// $routes->get('/barang', 'Barang::list', ['filter' => 'authGuard']);
// $routes->get('/buku', 'Buku::list', ['filter' => 'authGuard']);

//login stuff
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login_submit');
$routes->get('/logout', 'Auth::logout');


//crud single table
$routes->get('/jenisbarang', 'Jenisbarang::list');
$routes->get('/jenisbarang/insert', 'Jenisbarang::insert');
$routes->post('/jenisbarang/insert', 'Jenisbarang::insert_save');
$routes->get('/jenisbarang/(:segment)', 'Jenisbarang::update/$1');
$routes->post('/jenisbarang/(:segment)', 'Jenisbarang::update_save/$1');
$routes->get('/jenisbarang/delete/(:segment)', 'Jenisbarang::delete/$1');



$routes->get('/merk', 'Merk::list');
$routes->get('/merk/insert', 'Merk::insert');
$routes->post('/merk/insert', 'Merk::insert_save');
$routes->get('/merk/(:segment)', 'Merk::update/$1');
$routes->post('/merk/(:segment)', 'Merk::update_save/$1');
$routes->get('/merk/delete/(:segment)', 'MerK::delete/$1');






$routes->get('/jenisbarang_export_xls', 'JenisbarangExport::export_xls');
$routes->get('/jenisbarang_export_pdf', 'JenisbarangExport::export_pdf');

$routes->get('/merk_export_xls', 'MerkExport::export_xls');
$routes->get('/merk_export_pdf', 'MerkExport::export_pdf');






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
