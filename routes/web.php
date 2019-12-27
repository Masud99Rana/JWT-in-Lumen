<?php

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
    // return $router->app->version();
    // return "Welcome, Masud Rana";
    
    return response()->json([
    	'success' => true,
    	'message' => 'Welcome to my Api',
    	'Developer' => 'Masud Rana'
    ]);
});


$router->group(['prefix' => 'api/v1'], function () use ($router) {

// $router->group(['middleware' => 'auth'], function() use ($router){

	$router->get('/users','UsersController@index');
	$router->post('/users', 'UsersController@store');
	$router->patch('/users/{user}', 'UsersController@update');
	$router->delete('/users/{user}', 'UsersController@destroy');
});