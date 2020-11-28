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

$router->post('signin', ['as' => 'users.store', 'uses' => 'UserController@signIn']);
$router->post('login', ['as' => 'users.logIn', 'uses' => 'UserController@logIn']);

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('directorios', ['as' => 'directorios', 'uses' => 'DirectorioController@index']);
    $router->get('directorios/{id}', ['as' => 'directorios.show', 'uses' => 'DirectorioController@show']);
    $router->post('directorios', ['as' => 'directorios.store', 'uses' => 'DirectorioController@store']);
    $router->put('directorios/{id}', ['as' => 'directorios.update', 'uses' => 'DirectorioController@update']);
    $router->delete('directorios/{id}', ['as' => 'directorios.delete', 'uses' => 'DirectorioController@delete']);

    $router->post('logout', ['as' => 'logout', 'uses' => 'UserController@logOut']);

    $router->get('user', function () use($router){
        return auth()->user();
    });
});
