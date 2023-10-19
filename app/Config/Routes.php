<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->view('test', 'transaksi-1');
// Module Membership
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/registration', 'Auth::register');
$routes->post('/registration', 'Auth::registration');
$routes->get('/profile/(:any)', 'Auth::profile/$1', ['filter' => 'login']);
$routes->get('/updated/(:any)', 'Auth::updated/$1', ['filter' => 'login']);
$routes->post('/updated', 'Auth::change', ['filter' => 'login']);
$routes->post('/image', 'Auth::image', ['filter' => 'login']);
$routes->get('/logout', 'Auth::logout');

// Module Information
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'login']);

// Module Topup
$routes->get('/topup', 'Transaction::topup', ['filter' => 'login']);
$routes->post('/topup', 'Transaction::prosestopup', ['filter' => 'login']);

$routes->get('/services/(:any)', 'Transaction::services/$1', ['filter' => 'login']);
$routes->post('/transaction', 'Transaction::pembayaran', ['filter' => 'login']);
$routes->get('/history/(:any)', 'Transaction::history/$1', ['filter' => 'login']);
$routes->get('/history/all', 'Transaction::historyall', ['filter' => 'login']);
