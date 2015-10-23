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

$app->get('/', function() use ($app) {
    return "Lumen (<a href='http://lumen.laravel.com'>lumen.laravel.com</a>) RESTful API By NEXT LEVEL SHIT (<a href='http://dailysh.it'>www.dailysh.it</a>)";
});

$app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
{
    $app->get('task','TaskController@index');

    $app->get('task/{id}','TaskController@getTask');

    $app->post('task','TaskController@createTask');

    $app->put('task/{id}','TaskController@updateTask');

    $app->delete('task/{id}','TaskController@deleteTask');
});