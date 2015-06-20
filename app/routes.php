<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showDashboard');
Route::get('filter/{name}','HomeController@filterActivites');

Route::resource('project', 'ProjectsController', array('only' => array('index','create','store','show','edit','update','destroy')));
Route::resource('classification', 'ClassificationsController', array('only' => array('store','show','update','destroy')));
Route::resource('activity', 'ActivitiesController', array('only' => array('store','show','update','destroy')));
	Route::put('activity/{id}/done', 'ActivitiesController@done');
	Route::put('activity/{id}/undone', 'ActivitiesController@unDone');