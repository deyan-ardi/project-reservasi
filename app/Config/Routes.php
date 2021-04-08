<?php

namespace Config;

use CodeIgniter\Commands\Utilities\Routes;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Home Routes
$routes->get('/', 'Home::index');
$routes->get('/tentang-kami','Home::about');
$routes->get('/daftar-kamar','Home::daftar_kamar');
$routes->get('/kontak-kami','Home::kontak');
$routes->get('/booking-sekarang','Home::booking');
$routes->get('/detail-kamar','Home::detail_kamar');
$routes->get('/pengaturan-profil/(:num)', 'Home::pengaturan/$1', ['filter' => 'role:user']);
$routes->post('/pengaturan-profil/(:num)', 'Home::pengaturan/$1', ['filter' => 'role:user']);

// Admin All Routes
$routes->get('/admin','Admin::index', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/manajemen-kamar','Admin::manajemen_kamar', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/pesanan-masuk', 'Admin::pesanan_masuk', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/validasi-masuk', 'Admin::validasi_masuk', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/pesanan-tervalidasi', 'Admin::pesanan_tervalidasi', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/info-website', 'Admin::info_website', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/pengaturan-profil/(:num)', 'Admin::pengaturan/$1', ['filter' => 'role:admin,super admin']);
$routes->post('/admin/pengaturan-profil/(:num)', 'Admin::pengaturan/$1', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/tambah-kategori-kamar', 'Admin::tmb_kategori', ['filter' => 'role:admin,super admin']);
$routes->post('/admin/tambah-kategori-kamar', 'Admin::tmb_kategori', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/hapus-kategori-kamar/(:num)', 'Admin::hapus_kategori/$1', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/ubah-kategori-kamar/(:num)', 'Admin::ubah_kategori/$1', ['filter' => 'role:admin,super admin']);
$routes->post('/admin/ubah-kategori-kamar/(:num)', 'Admin::ubah_kategori/$1', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/tambah-kamar', 'Admin::tmb_kamar', ['filter' => 'role:admin,super admin']);
$routes->post('/admin/tambah-kamar', 'Admin::tmb_kamar', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/hapus-kamar/(:num)', 'Admin::hapus_kamar/$1', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/ubah-kamar/(:num)', 'Admin::ubah_kamar/$1', ['filter' => 'role:admin,super admin']);
$routes->post('/admin/ubah-kamar/(:num)', 'Admin::ubah_kamar/$1', ['filter' => 'role:admin,super admin']);

// Super Admin Routes
$routes->get('/admin/manajemen-pegawai', 'Admin::manajemen_pegawai', ['filter' => 'role:super admin']);
$routes->get('/admin/manajemen-user', 'Admin::manajemen_user', ['filter' => 'role:super admin']);
$routes->get('/admin/hapus-pegawai/(:num)', 'Admin::hapus_pegawai/$1', ['filter' => 'role:super admin']);
$routes->get('/admin/ubah-pegawai/(:num)', 'Admin::ubah_pegawai/$1', ['filter' => 'role:super admin']);
$routes->post('/admin/ubah-pegawai/(:num)', 'Admin::ubah_pegawai/$1', ['filter' => 'role:super admin']);
$routes->get('/admin/hapus-user/(:num)', 'Admin::hapus_user/$1', ['filter' => 'role:super admin']);
$routes->get('/admin/ubah-user/(:num)', 'Admin::ubah_user/$1', ['filter' => 'role:super admin']);
$routes->post('/admin/ubah-user/(:num)', 'Admin::ubah_user/$1', ['filter' => 'role:super admin']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}