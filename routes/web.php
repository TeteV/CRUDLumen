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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('signin', ['as' => 'users.store', 'uses' => 'UserController@signIn']);
    $router->post('login', ['as' => 'users.logIn', 'uses' => 'UserController@logIn']);
});

//->post('signin', ['as' => 'users.store', 'uses' => 'UserController@signIn']);
//$router->post('login', ['as' => 'users.logIn', 'uses' => 'UserController@logIn']);

$router->group(['middleware' => 'auth'], function () use ($router) {

    $router->get('rooms', ['as' => 'rooms', 'uses' => 'RoomsController@index']);
    $router->get('rooms/{num}', ['as' => 'rooms.show', 'uses' => 'RoomsController@show']);
    $router->post('add-room', ['as' => 'rooms.store', 'uses' => 'RoomsController@store']);
    $router->put('update-room/{num}', ['as' => 'rooms.update', 'uses' => 'RoomsController@update']);
    $router->delete('delete-room/{num}', ['as' => 'rooms.delete', 'uses' => 'RoomsController@delete']);

    $router->get('users', ['as' => 'users', 'uses' => 'UserController@index']);
    $router->get('user/{dni}', ['as' => 'user.show', 'uses' => 'UserController@show']);
    $router->put('update-user/{dni}', ['as' => 'user.update', 'uses' => 'UserController@update']);
    $router->delete('delete-user/{dni}', ['as' => 'user.delete', 'uses' => 'UserController@delete']);

    $router->post('logout', ['as' => 'logout', 'uses' => 'UserController@logOut']);

    $router->get('user', function () use($router){
        return auth()->user();
    });
});
