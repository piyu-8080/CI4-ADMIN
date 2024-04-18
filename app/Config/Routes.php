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
$routes->get('projects_list', 'Home::projects_list');

$routes->get('add_clients', 'Home::add_clients');
$routes->post('addclients', 'Home::add_clients');


$routes->get('add_projects', 'Home::add_projects');

$routes->post('add_projects', 'Home::add_projects');


$routes->get('change_status/(:num)/(:any)', 'Home::change_status/$1/$2');
// Route for editing a client
// Route for editing a client
$routes->get('edit_client/(:num)', 'Home::edit_client/$1');
// In routes.php or similar routing file


$routes->match(['get', 'post'], 'delete_client/(:num)', 'Home::delete_client/$1');


// For GET requests to view the update form

// For POST requests to update the client
$routes->post('update_client/(:num)', 'Home::updateClient/$1');


// Edit project form
$routes->get('edit_project/(:num)', 'Home::edit_project/$1');

// Update project
$routes->post('update_project/(:num)', 'Home::update_project/$1');



$routes->get('delete_project/(:num)', 'Home::delete_project/$1');

$routes->get('change_status1/(:num)/(:any)', 'Home::change_status1/$1/$2');








//other code
$routes->get('charts', 'Home::charts');
$routes->get('cards', 'Home::cards');

$routes->get('utilities_color', 'Home::utilities_color');
$routes->get('utilities_border', 'Home::utilities_border');
$routes->get('utilities_animation', 'Home::utilities_animation');
$routes->get('utilities_other', 'Home::utilities_other');

$routes->get('404', 'Home::error404');
$routes->get('blank', 'Home::blank');
