<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::processRegister');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');
$routes->get('/dashboard', 'Dashboard::main', ['filter' => 'auth']);
$routes->get('/logout', 'Auth::logout');

//dropdown menu profile 
//profile pengguna
$routes->get('/profile', 'ProfilePenggunaController::index');
$routes->post('profile/upload-profile-pengguna', 'ProfilePenggunaController::uploadProfilePengguna');
$routes->get('profile/delete-profile-pengguna', 'ProfilePenggunaController::deleteProfilePengguna/$1');

//alamat pengguna
$routes->get('/alamat', 'AlamatPenggunaController::index');
$routes->post('/alamat/tambah-alamat-pengguna', 'AlamatPenggunaController::tambahAlamatPengguna');
$routes->get('/alamat/hapus-alamat-pengguna', 'AlamatPenggunaController::hapusAlamatPengguna');

//nomor whatsapp pengguna
$routes->get('/whatsapp', 'UserWhatsappController::index');
$routes->post('/whatsapp/tambah-whatsapp-pengguna', 'UserWhatsappController::tambahWhatsAppPengguna');
$routes->post('/whatsapp/edit-whatsapp-pengguna', 'UserWhatsappController::editWhatsAppPengguna');
$routes->get('/whatsapp/hapus-whatsapp-pengguna', 'UserWhatsappController::hapuseWhatsAppPengguna');

//doropdown menu setting
$routes->get('/settings', 'SettingController::index', ['filter' => 'auth']);
$routes->post('settings/update-username-pengguna', 'SettingController::updateUsernamePengguna');
$routes->post('settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->get('/settings/verify-email-pengguna', 'SettingController::verifyEmailPengguna');
$routes->post('settings/update-email-pengguna', 'SettingController::updateEmailPengguna');
$routes->post('settings/update-password-pengguna', 'SettingController::updatePasswordPengguna');

//pesanan pengguna
$routes->get('/pesanan', 'Orders::index'); // Tampilkan daftar pesanan
$routes->get('/pesanan/create-pesanan-pengguna', 'Orders::createPesananPengguna'); // Tampilkan form tambah
$routes->post('/pesanan/tambah--pesanan-pengguna', 'Orders::tambahPesananPengguna'); // Simpan data pesanan baru
$routes->get('/pesanan/edit-pesanan-pengguna/(:num)', 'Orders::editPesananPengguna/$1'); // Tampilkan form edit
$routes->post('/pesanan/update-pesanan-pengguna/(:num)', 'Orders::updatePesananPengguna/$1'); // Update pesanan
$routes->get('/pesanan/delete-pesanan-pengguna/(:num)', 'Orders::hapusPesananPengguna/$1'); // Hapus pesanan