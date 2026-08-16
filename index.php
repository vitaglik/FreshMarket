<?php

session_start();

require_once __DIR__.'/core/Autoloader.php';

$router = new core\Router();

/**
 * Можно писать роуты тут, либо сделать для них отдельный файл (в Ларке он например называется web.php)
 */
$router->get('/', 'app\Controllers\HomeController@index');
$router->get('/product/{id}', 'app\Controllers\ProductController@getProduct');
$router->get('/api/v1/product/{id}', 'app\Controllers\ProductController@getProductApi');
$router->get('/api/v1/listing', 'app\Controllers\ListingController@getListingApi');
$router->get('/listing', 'app\Controllers\ListingController@getListing');
$router->get('/listing/{filter}', 'app\Controllers\ListingController@filterListingGet');
$router->post('/listing', 'app\Controllers\ListingController@filterListingPost');
$router->post('/cart', 'app\Controllers\ProductController@addToCart');
$router->get('/cart', 'app\Controllers\CartController@getCart');
$router->delete('/cart', 'app\Controllers\CartController@deleteFromCart');
$router->patch('/cart', 'app\Controllers\CartController@updateProductInCart');
$router->get('/checkout', 'app\Controllers\CheckoutController@getCheckout');
$router->post('/success', 'app\Controllers\CheckoutController@sendCheckoutEmail');
$router->get('/success', 'app\Controllers\ThanksController@getSuccess');

/**
 * Admin tools
 */

$router->get('/admin', 'admintools\Controllers\AuthController@index');
$router->post('/admin/login', 'admintools\Controllers\AuthController@login');
$router->get('/admin/categories', 'admintools\Controllers\CategoryController@list');
$router->post('/admin/categories', 'admintools\Controllers\CategoryController@editCategory');
$router->delete('/admin/categories', 'admintools\Controllers\CategoryController@deleteCategory');
$router->get('/admin/products', 'admintools\Controllers\ProductsController@getProduct');
$router->post('/admin/products', 'admintools\Controllers\ProductsController@getPrice');
$router->get('/admin/orders', 'admintools\Controllers\OrdersController@getOders');
$router->get('/admin/users', 'admintools\Controllers\UsersController@list');




$router->dispatch($_SERVER['REQUEST_URI']);