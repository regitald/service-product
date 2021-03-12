<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(['prefix' => 'cms'], function () use ($router) {
    $router->get('/product', 'CMS\ProductController@index');
    $router->get('/product/{id}', 'CMS\ProductController@show');
    $router->post('/product', 'CMS\ProductController@store');
    $router->put('/product/{id}', 'CMS\ProductController@update');
    $router->delete('/product/{id}', 'CMS\ProductController@destroy');

    $router->get('/category', 'CMS\CategoryController@index');
    $router->get('/category/{id}', 'CMS\CategoryController@show');
    $router->post('/category', 'CMS\CategoryController@store');
    $router->put('/category/{id}', 'CMS\CategoryController@update');
    $router->delete('/category/{id}', 'CMS\CategoryController@destroy');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/product', 'API\ProductController@index');
    $router->get('/product/{id}', 'API\ProductController@show');
    $router->get('/category', 'API\ProductController@category');
    $router->get('/category/{id}', 'API\ProductController@categoryShow');
});
