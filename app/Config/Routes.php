<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');

$routes->get('login', 'Home::login');
$routes->post('login', 'Home::login');

$routes->match(['get', 'post'], 'edit/(:num)', 'SigninController::edit/$1');
$routes->match(['get', 'post'], 'update/(:num)', 'SigninController::update/$1');

$routes->get('company_details', 'CompanyController::company_details');
$routes->post('company_details', 'CompanyController::company_details'); // View company details

$routes->get('add-company', 'CompanyController::addCompany');
$routes->post('add-company', 'CompanyController::addCompany');

$routes->get('change-password', 'Home::change_password');
$routes->post('change-password', 'Home::change_password');


$routes->match(['get', 'post'], 'edit-company/(:num)', 'CompanyController::editCompany/$1');
$routes->match(['get', 'post'], 'update-company/(:num)', 'CompanyController::updateCompany/$1');


$routes->get('delete-company/(:num)', 'CompanyController::deleteCompany/$1'); // Route for deleting company


$routes->get('delete/(:num)', 'SigninController::confirmDelete/$1');
$routes->post('delete', 'SigninController::cancelDelete');

$routes->get('company_data', 'Home::company_data');
$routes->post('company_data', 'Home::company_data');

$routes->get('logout', 'Home::logout');

$routes->match(['get','post'],'SigninController/loginAuth', 'SigninController::loginAuth');

$routes->get('register', 'Home::register');
$routes->post('register', 'Home::register');

$routes->get('forgot_password', 'Home::forgot_password');

$routes->get('tables', 'Home::tables');

$routes->get('clients_list', 'Home::clients_list');
















//other code
$routes->get('charts', 'Home::charts');
$routes->get('cards', 'Home::cards');

$routes->get('utilities_color', 'Home::utilities_color');
$routes->get('utilities_border', 'Home::utilities_border');
$routes->get('utilities_animation', 'Home::utilities_animation');
$routes->get('utilities_other', 'Home::utilities_other');

$routes->get('404', 'Home::error404');
$routes->get('blank', 'Home::blank');
