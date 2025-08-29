<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Login
$routes->get('/', 'Login::index');
$routes->post('login/autenticar', 'Login::autenticar');
$routes->get('login/salir', 'Login::salir');

// Dashboards
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('bibliotecario/dashboard', 'BibliotecarioController::dashboard');
$routes->get('alumno/dashboard', 'AlumnoController::dashboard');

// CRUD Libros (solo accesible por bibliotecario o admin)
$routes->get('libros', 'LibrosController::index');
$routes->get('libros/create', 'LibrosController::create');
$routes->post('libros/store', 'LibrosController::store');
$routes->get('libros/edit/(:num)', 'LibrosController::edit/$1');
$routes->post('libros/update/(:num)', 'LibrosController::update/$1');
$routes->get('libros/delete/(:num)', 'LibrosController::delete/$1');

// CRUD Usuarios (solo admin)
$routes->get('usuarios', 'UsuariosController::index');
$routes->get('usuarios/create', 'UsuariosController::create');
$routes->post('usuarios/store', 'UsuariosController::store');
$routes->get('usuarios/edit/(:num)', 'UsuariosController::edit/$1');
$routes->post('usuarios/update/(:num)', 'UsuariosController::update/$1');
$routes->get('usuarios/delete/(:num)', 'UsuariosController::delete/$1');

// Préstamos y devoluciones (bibliotecario)
$routes->get('prestamos', 'PrestamosController::index');
$routes->post('prestamos/store', 'PrestamosController::store');
$routes->post('devoluciones/store', 'PrestamosController::devolver');

