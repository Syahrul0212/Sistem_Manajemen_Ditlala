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
$routes->get('/barang', 'Barang::list', ['filter' => 'authGuard']);
// $routes->get('/buku', 'Buku::list', ['filter' => 'authGuard']);

//login stuff
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login_submit');
$routes->get('/logout', 'Auth::logout');

//param get & post
// $routes->get('/post_request', 'Form::post_request');
// $routes->post('/post_response', 'Form::post_response');
// $routes->get('/get_request', 'Form::get_request');
// $routes->get('/get_response/(:segment)/(:segment)', 'Form::get_response/$1/$2');

//crud single table
$routes->get('/barang', 'Barang::list');
$routes->get('/barang/insert', 'Barang::insert');
$routes->post('/barang/insert', 'Barang::insert_save');
$routes->get('/barang/(:segment)', 'Barang::update/$1');
$routes->post('/barang/(:segment)', 'Barang::update_save/$1');
$routes->get('/barang/delete/(:segment)', 'Barang::delete/$1');

$routes->get('/merk', 'Merk::list');
$routes->get('/merk/insert', 'Merk::insert');
$routes->post('/merk/insert', 'Merk::insert_save');
$routes->get('/merk/(:segment)', 'Merk::update/$1');
$routes->post('/merk/(:segment)', 'Merk::update_save/$1');
$routes->get('/merk/delete/(:segment)', 'MerK::delete/$1');

$routes->get('/rak', 'Rak::list');
$routes->get('/rak/insert', 'Rak::insert');
$routes->post('/rak/insert', 'Rak::insert_save');
$routes->get('/rak/(:segment)', 'Rak::update/$1');
$routes->post('/rak/(:segment)', 'Rak::update_save/$1');
$routes->get('/rak/delete/(:segment)', 'RaK::delete/$1');

// $routes->get('/kategori', 'Kategori::list');
// $routes->get('/kategori/insert', 'Kategori::insert');
// $routes->post('/kategori/insert', 'Kategori::insert_save');
// $routes->get('/kategori/(:segment)', 'Kategori::update/$1');
// $routes->post('/kategori/(:segment)', 'Kategori::update_save/$1');
// $routes->get('/kategori/delete/(:segment)', 'Kategori::delete/$1');
//end crud single table


//
// $routes->get('/provinsi', 'Provinsi::list');
// $routes->get('/provinsi/insert', 'Provinsi::insert');
// $routes->post('/provinsi/insert', 'Provinsi::insert_save');
// $routes->get('/provinsi/(:segment)', 'Provinsi::update/$1');
// $routes->post('/provinsi/(:segment)', 'Provinsi::update_save/$1');
// $routes->get('/provinsi/delete/(:segment)', 'Provinsi::delete/$1');
//end crud single table

//crud Many-Many table
// $routes->get('/peminjaman', 'Peminjaman::list');
// $routes->get('/peminjaman_buku/(:segment)', 'PeminjamanBuku::list/$1');
// $routes->get('/peminjaman_buku/insert/(:segment)', 'PeminjamanBuku::insert/$1');
// $routes->post('/peminjaman_buku/insert/(:segment)', 'PeminjamanBuku::insert_save/$1');
// $routes->get('/peminjaman_buku/delete/(:segment)', 'PeminjamanBuku::delete/$1');
// end crud Many-Many table


//crud 1-Many table



// $routes->get('/buku', 'Buku::list');
// $routes->get('/buku/insert', 'Buku::insert');
// $routes->post('/buku/insert', 'Buku::insert_save');
// $routes->get('/buku/(:segment)', 'Buku::update/$1');
// $routes->post('/buku/(:segment)', 'Buku::update_save/$1');
// $routes->get('/buku/delete/(:segment)', 'Buku::delete/$1');





//end crud 1-Many table

//crud 1-Many table
// $routes->get('/kota', 'Kota::list');
// $routes->get('/kota/insert', 'Kota::insert');
// $routes->post('/kota/insert', 'Kota::insert_save');
// $routes->get('/kota/(:segment)', 'Kota::update/$1');
// $routes->post('/kota/(:segment)', 'Kota::update_save/$1');
// $routes->get('/kota/delete/(:segment)', 'Kota::delete/$1');
//end crud 1-Many table

//export
$routes->get('/barang_export_xls', 'BarangExport::export_xls');
$routes->get('/barang_export_pdf', 'BarangExport::export_pdf');
// $routes->get('/buku_export_xls', 'BukuExport::export_xls');
// $routes->get('/buku_export_pdf', 'BukuExport::export_pdf');
//end crud 1-Many table
//export
// $routes->get('/kota_export_xls', 'KotaExport::export_xls');
// $routes->get('/kota_export_pdf', 'KotaExport::export_pdf');
//end crud 1-Many table

$routes->get('/chart/pie', 'Chart::pie');
$routes->get('/chart/line', 'Chart::line');
$routes->get('/chart/pie2', 'Chart::pieKategori');

// TB2
// $routes->get('/kamar', 'Kamar::list');
// $routes->get('/kamar/insert', 'Kamar::insert');
// $routes->post('/kamar/insert', 'Kamar::insert_save');
// $routes->get('/kamar/(:segment)', 'Kamar::update/$1');
// $routes->post('/kamar/(:segment)', 'Kamar::update_save/$1');
// $routes->get('/kamar/delete/(:segment)', 'Kamar::delete/$1');

// $routes->get('/perawat', 'Perawat::list');
// $routes->get('/perawat/insert', 'Perawat::insert');
// $routes->post('/perawat/insert', 'Perawat::insert_save');
// $routes->get('/perawat/(:segment)', 'Perawat::update/$1');
// $routes->post('/perawat/(:segment)', 'Perawat::update_save/$1');
// $routes->get('/perawat/delete/(:segment)', 'Perawat::delete/$1');

// $routes->get('/kelas', 'Kelas::list');
// $routes->get('/kelas/insert', 'Kelas::insert');
// $routes->post('/kelas/insert', 'Kelas::insert_save');
// $routes->get('/kelas/(:segment)', 'Kelas::update/$1');
// $routes->post('/kelas/(:segment)', 'Kelas::update_save/$1');
// $routes->get('/kelas/delete/(:segment)', 'Kelas::delete/$1');



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
