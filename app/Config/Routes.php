<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->get('/auth/process', 'Auth::Process');
$routes->get('/auth/logout', 'Auth::Logout');

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/jabatan', 'Jabatan::index', ['filter' => 'auth']);
$routes->post('/jabatan/insertData', 'Jabatan::insertData');
$routes->post('/jabatan/updateData/(:num)', 'Jabatan::updateData/$1');
$routes->get('/jabatan/deleteData/(:num)', 'Jabatan::deleteData/$1', ['filter' => 'auth']);

$routes->get('/user', 'User::index', ['filter' => 'auth']);
$routes->post('/user/insertData', 'User::insertData');
$routes->post('/user/updateData/(:num)', 'User::updateData/$1');
$routes->get('/user/deleteData/(:num)', 'User::deleteData/$1', ['filter' => 'auth']);

$routes->get('/status', 'Status::index', ['filter' => 'auth']);
$routes->post('/status/insertData', 'Status::insertData');
$routes->post('/status/updateData/(:num)', 'Status::updateData/$1');
$routes->get('/status/deleteData/(:num)', 'Status::deleteData/$1', ['filter' => 'auth']);

$routes->get('/sdm_detail', 'SdmDetail::index', ['filter' => 'auth']);
$routes->post('/sdm_detail/insertData', 'SdmDetail::insertData');
$routes->post('/sdm_detail/updateData/(:num)', 'SdmDetail::updateData/$1');
$routes->get('/sdm_detail/deleteData/(:num)', 'SdmDetail::deleteData/$1', ['filter' => 'auth']);

$routes->get('/sdm', 'Sdm::index', ['filter' => 'auth']);
$routes->get('/sdm/dosen', 'Sdm::dosen', ['filter' => 'auth']);
$routes->get('/sdm/staff', 'Sdm::staff', ['filter' => 'auth']);
$routes->post('/sdm/insertData', 'Sdm::insertData');
$routes->post('/sdm/updateData/(:num)', 'Sdm::updateData/$1');
$routes->post('/sdm/tambahSP/(:num)', 'Sdm::tambahSP/$1');
$routes->get('/sdm/deleteData/(:num)', 'Sdm::deleteData/$1', ['filter' => 'auth']);

