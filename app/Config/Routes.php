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

$routes->get('/profile', 'Dashboard::index');
$routes->post('/profile/upload-picture', 'Dashboard::uploadPicture');

$routes->get('alamat-pengguna', 'AddressController::index');
$routes->get('addresses/create', 'AddressController::create');
$routes->post('addresses/store', 'AddressController::store');
$routes->get('profile/edit-alamat-pengguna/(:num)', 'AddressController::edit/$1');
$routes->post('profile/update-alamat-pengguna', 'AddressController::update');
$routes->get('profile/delete-alamat-pengguna/(:num)', 'AddressController::delete/$1');

$routes->get('whatsapp/upload-nomor-whatsapp', 'Dashboard::uploadNomorWhatsApp');
$routes->post('whatsapp/send-kode-otp', 'Dashboard::sendKodeOTP');
$routes->post('whatsapp/verify-kode-otp', 'Dashboard::verifyKodeOtp');

$routes->get('/settings', 'SettingController::index', ['filter' => 'auth']);
$routes->post('settings/update-username-pengguna', 'SettingController::updateUsernamePengguna');
$routes->post('settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->get('/settings/verify-email-pengguna', 'SettingController::verifyEmailPengguna');
$routes->post('settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->post('settings/update-password-pengguna', 'SettingController::updatePasswordPengguna');