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
$routes->post('/profile/update-picture', 'ProfileController::updateProfilePicture');
$routes->post('/profile/update-address', 'ProfileController::updateAddress');
$routes->post('/profile/update-whatsapp', 'ProfileController::updateWhatsApp');
$routes->post('/profile/verify-otp', 'ProfileController::verifyOtp');