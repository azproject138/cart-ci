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
$routes->post('/profile/update-address', 'Dashboard::updateAddress');
$routes->post('/profile/update-whatsapp', 'Dashboard::updateWhatsApp');
$routes->post('/profile/verify-otp', 'Dashboard::verifyOtp');