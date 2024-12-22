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

$routes->post('simpan/alamat', 'Dashboard::saveAlamatPengguna');
$routes->get('upload-alamat-pengguna', 'Dashboard::viewAlamatPengguna');

$routes->get('whatsapp/upload-nomor-whatsapp', 'Dashboard::uploadNomorWhatsApp');
$routes->post('whatsapp/send-kode-otp', 'Dashboard::sendKodeOTP');
$routes->post('whatsapp/verify-kode-otp', 'Dashboard::verifyKodeOtp');

$routes->get('/settings', 'SettingController::index', ['filter' => 'auth']);
$routes->post('settings/update-username-pengguna', 'SettingController::updateUsernamePengguna');

$routes->post('user/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->get('user/verify-email-pengguna', 'SettingController::verifyEmailPengguna');
$routes->post('/settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->post('/settings/update-password-pengguna', 'SettingController::updatePasswordPengguna');