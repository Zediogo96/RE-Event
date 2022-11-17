<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Home
Route::get('/', 'Auth\LoginController@home');

// Cards
Route::get('cards', 'CardController@list');
Route::get('cards/{id}', 'CardController@show');

// API
Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Home Page
Route::get('home', 'HomeController@home')->name('home.show');
Route::get('login', 'HomeController@login')->name('login.show');

// Events Related
Route::get('event{eventid?}', 'EventController@show')->name('event.show');

// Static Pages
Route::get('aboutUs', 'PageController@aboutUs')->name('aboutUs.index');
Route::get('faq', 'PageController@faq')->name('faq.index');

Route::get('searchTest','SearchController@index')->name('search.test');
Route::get('search','SearchController@search');

Route::get('user{userid?}', 'UserController@show')->name('user.show');

//testing database data

Route::get('cities', 'CityController@index');
Route::get('countries', 'CountryController@index');
Route::get('events', 'EventController@index');

