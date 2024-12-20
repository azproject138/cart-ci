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
$routes->post('/profile/update-alamat-pengguna', 'Dashboard::updateAlamatPengguna');

$routes->get('whatsapp/update', 'Dashboard::uploadNomorWhatsApp');
$routes->post('whatsapp/send-kode-otp', 'Dashboard::sendKodeOTP');
$routes->post('whatsapp/verify-kode-otp', 'Dashboard::verifyKodeOtp');