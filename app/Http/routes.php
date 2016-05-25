<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@welcome')->name('welcome');

Route::get('/movie/{id}', 'WelcomeController@movieInfo')->name('movieInfo');

Route::get('/actor/{id}', 'WelcomeController@actorInfo')->name('actorInfo');

Route::get('/actors', 'WelcomeController@actorsList')->name('actorsList');

Route::get('/api/clickstream/{event}/{user}/{itemType}/{itemId}', 'WelcomeController@clickstreamEvent')->name('click');

//http://localhost:8001/api/clickstream/click/7dfe15a2-919c-74d7-3575-03dbafda645d/page/%2Factor%2F84138

Route::get('/properties', 'WelcomeController@propertyList')->name('propertyList');

Route::get('/property/{id}', 'WelcomeController@propertyInfo')->name('propertyInfo');