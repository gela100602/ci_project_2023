<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

# '/' defines the url (views)
# controller::function

$routes->get('/', 'Login::login');
$routes->post('/login', 'Login::login');

$routes->get('/confirm_logout', 'Logout::confirmLogout');
$routes->get('/logout', 'Logout::logout');

// $routes->group('', ['filter' => 'AuthUser'], function ($routes){
// });

$routes->get('/dashboard', 'Dashboard::index');

// Employees
$routes->get('/employees', 'Employees::index');
$routes->get('/employees/add', 'Employees::add');
$routes->post('/employees/add', 'Employees::addEmployee');

$routes->get('/employees/edit/(:num)', 'Employees::edit/$1');
$routes->post('/employees/edit/(:num)', 'Employees::edit/$1');

$routes->get('/employees/view/(:num)', 'Employees::view/$1');
$routes->post('/employees/view/(:num)', 'Employees::view/$1');

$routes->post('/employees/(:num)', 'Employees::delete/$1');

// Departments
$routes->get('/department', 'Department::index');

// Shifts
$routes->get('/shift', 'Shift::index');

// Shifts
$routes->get('/location', 'Location::index');