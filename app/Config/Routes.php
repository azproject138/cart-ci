<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::processRegister');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');

