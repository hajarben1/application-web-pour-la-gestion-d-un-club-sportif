<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
// Auth Controller 
$routes->get('/sign-up', 'Auth::signUp');
$routes->get('/sign-in', 'Auth::signIn');
$routes->post('/login', 'Auth::login');
$routes->post('/create', 'Auth::create');
$routes->get('/logout', 'Auth::logout');
$routes->get('/profile', 'Auth::update');
$routes->post('/update_user', 'Auth::update_user');

// Home Controller

// Reclamation Controller
$routes->get('/reclame', 'ReclamationController::index', ['filter' => 'auth']);
$routes->post('/reclame/create', 'ReclamationController::create', ['filter' => 'auth']);
$routes->post('/reclame/createex', 'ReclamationController::createex', ['filter' => 'auth']);
$routes->post('/reclame/change', 'ReclamationController::change', ['filter' => 'auth']);
$routes->put('/reclame/update/(:num)', 'ReclamationController::update/$1');
$routes->get('/reclame/edit/(:num)', 'ReclamationController::edit/$1');
$routes->get('/reclame/delete/(:num)', 'ReclamationController::delete/$1');

// List Reclamation Controller
$routes->get('/list-reclame', 'ReclamationController::listreclamation', ['filter' => 'auth']);
