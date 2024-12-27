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

$routes->get('/profile', 'ProfilePenggunaController::index');
$routes->post('profile/upload-profile-pengguna', 'ProfilePenggunaController::uploadProfilePengguna');
$routes->get('profile/delete-profile-pengguna', 'ProfilePenggunaController::deleteProfilePengguna/$1');

$routes->get('/alamat-pengguna', 'AlamatPenggunaController::index');
$routes->get('/profile/create', 'AlamatPenggunaController::createAlamatPengguna');
$routes->post('/profile/create-alamat-pengguna', 'AlamatPenggunaController::createAlamatPengguna');
$routes->get('/profile/edit/(:num)', 'AlamatPenggunaController::edit/$1');
$routes->post('/profile/edit-alamat-pengguna/(:num)', 'AlamatPenggunaController::editAlamatPengguna/$1');
$routes->get('/profile/hapus-alamat-pengguna/(:num)', 'AlamatPenggunaController::hapusAlamatPengguna/$1');

$routes->get('/whatsapp', 'UserWhatsappController::index');
$routes->post('/whatsapp/tambah-whatsapp-pengguna', 'UserWhatsappController::tambahWhatsAppPengguna');
$routes->post('/whatsapp/edit-whatsapp-pengguna', 'UserWhatsappController::editWhatsAppPengguna');
$routes->get('/whatsapp/hapus-whatsapp-pengguna', 'UserWhatsappController::hapuseWhatsAppPengguna');

$routes->get('/settings', 'SettingController::index', ['filter' => 'auth']);
$routes->post('settings/update-username-pengguna', 'SettingController::updateUsernamePengguna');
$routes->post('settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->get('/settings/verify-email-pengguna', 'SettingController::verifyEmailPengguna');
$routes->post('settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->post('settings/update-password-pengguna', 'SettingController::updatePasswordPengguna');