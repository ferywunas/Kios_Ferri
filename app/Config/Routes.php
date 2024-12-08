<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');

// Pelanggan
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->post('/pelanggan/create', 'Pelanggan::create');
$routes->get('/pelanggan/edit/(:segment)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update/(:segment)', 'Pelanggan::update/$1');
$routes->post('/pelanggan/delete/(:segment)', 'Pelanggan::delete/$1');

//Produk
$routes->get('/produk/produk', 'Produk::index');
$routes->post('/produk/produk/create', 'Produk::create');
$routes->get('/produk/produk/edit/(:segment)', 'Produk::edit/$1');
$routes->post('/produk/produk/update/(:segment)', 'Produk::update/$1');
$routes->post('/produk/produk/delete/(:segment)', 'Produk::delete/$1');

//kategori
$routes->get('/produk/kategori', 'Kategori::index');
$routes->post('/produk/kategori/create', 'Kategori::create');
$routes->get('/produk/kategori/edit/(:segment)', 'Kategori::edit/$1');
$routes->post('/produk/kategori/update/(:segment)', 'Kategori::update/$1');
$routes->post('/produk/kategori/delete/(:segment)', 'Kategori::delete/$1');
$routes->get('/produk/kategori/produkByKategori/(:num)', 'Kategori::produkByKategori/$1');

//Supplier
$routes->get('/produk/supplier', 'Supplier::index');
$routes->post('/produk/supplier/create', 'Supplier::create');
$routes->get('/produk/supplier/edit/(:segment)', 'Supplier::edit/$1');
$routes->post('/produk/supplier/update/(:segment)', 'Supplier::update/$1');
$routes->post('/produk/supplier/delete/(:segment)', 'Supplier::delete/$1');

//Pembelian
$routes->get('/transaksi/pembelian', 'Pembelian::index');
$routes->post('/transaksi/pembelian/create', 'Pembelian::create');
$routes->get('/transaksi/pembelian/edit/(:segment)', 'Pembelian::edit/$1');
$routes->post('/transaksi/pembelian/update/(:segment)', 'Pembelian::update/$1');
$routes->post('/transaksi/pembelian/delete/(:segment)', 'Pembelian::delete/$1');

//Penjualan
$routes->get('/transaksi/penjualan', 'Penjualan::index');

//Pembayaran
$routes->get('/transaksi/pembayaran', 'Pembayaran::index');
