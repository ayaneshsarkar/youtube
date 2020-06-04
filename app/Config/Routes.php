<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home\Home');
$routes->setDefaultMethod('view');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('logout', 'Users\Users::logout');
$routes->get('verify/(:any)', 'Users\Users::verify/$1');
$routes->get('users/users/login', 'Users\Users::login');
$routes->get('users/users/signup', 'Users\Users::signup');

$routes->get('studio/delete/delete/(:any)', 'Studio\Delete::delete/$1');
$routes->get('studio/update/update/(:any)', 'Studio\Update::update/$1');
$routes->get('studio/create/create', 'Studio\Create::create');
$routes->get('videos', 'Studio\Videos::index');
$routes->get('dashboard', 'Studio\Dashboard::index');

$routes->get('history', 'History::history');
$routes->get('view/(:any)', 'View::view/$1');
$routes->get('subscribe/(:any)', 'Subscribers::subscribers/$1');
$routes->get('search?(:any)', 'Search::search/$1');

$routes->get('(:any)', 'Home::view/$1');


$routes->post('likes/(:any)', 'Likes::create/$1');
$routes->post('subscribeaction/(:any)', 'Subscribers::subscribe/$1');
// $routes->post('searchajax', 'Search::searchajax');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
