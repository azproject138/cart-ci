<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::processRegister');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');
$routes->get('/dashboard', 'Dashboard::main', ['filter' => 'auth']);
$routes->get('/logout', 'Auth::logout');

$routes->get('/profile', 'ProfilePenggunaController::index', ['filter' => 'auth']);
$routes->post('profile/upload-profile-pengguna', 'ProfilePenggunaController::uploadProfilePengguna');
$routes->get('profile/delete-profile-pengguna/(:num)', 'ProfilePenggunaController::deleteProfilePengguna/$1');

$routes->get('alamat-pengguna', 'AlamatPenggunaController::index');
$routes->get('profile/create-alamat-pengguna', 'AlamatPenggunaController::create');
$routes->post('profile/store-alamat-pengguna', 'AlamatPenggunaController::store');
$routes->post('profile/edit-alamat-pengguna/(:num)', 'AlamatPenggunaController::edit/$1');
$routes->post('profile/update-alamat-pengguna', 'AlamatPenggunaController::update');
$routes->get('profile/delete-alamat-pengguna/(:num)', 'AlamatPenggunaController::delete/$1');

//$routes->group('/pengguna-whatsapp', ['filter' => 'auth'], function ($routes) {
//});

$routes->get('/whatsapp', 'UserWhatsAppController::index', ['filter' => 'auth']);
$routes->post('/whatsapp/tambah-whatsapp-pengguna', 'UserWhatsAppController::tambahWhatsappPengguna');
$routes->get('/whatsapp/edit-whatsapp-pengguna/(:num)', 'UserWhatsAppController::editWhatsappPengguna/$1');
$routes->post('/whatsapp/update-whatsapp-pengguna/(:num)', 'UserWhatsAppController::updateWhatsappPengguna/$1');
$routes->get('/whatsapp/delete-whatsapp-pengguna/(:num)', 'UserWhatsAppController::deleteWhatsappPengguna/$1');

$routes->get('/settings', 'SettingController::index', ['filter' => 'auth']);
$routes->post('settings/update-username-pengguna', 'SettingController::updateUsernamePengguna');
$routes->post('settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->get('/settings/verify-email-pengguna', 'SettingController::verifyEmailPengguna');
$routes->post('settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->post('settings/update-password-pengguna', 'SettingController::updatePasswordPengguna');