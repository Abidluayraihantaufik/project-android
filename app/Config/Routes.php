<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/regist', 'RegistrationController::regist');
$routes->post('/login', 'LoginController::login');

$routes->post('/products/create', 'ProductsController::create');
$routes->post('/products/(:num)/update', 'ProductsController::updateProductById/$1');
$routes->get('/products/(:num)', 'ProductsController::detailProductById/$1');
$routes->delete('/products/(:num)', 'ProductsController::removeProductById/$1');
$routes->get('/products', 'ProductsController::getAllProducts');
