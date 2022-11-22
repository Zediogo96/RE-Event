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
// Route::get('cards/{id}', 'CardController@show');

// API
Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication
Route::get('login', 'HomeController@login')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'HomeController@login')->name('register');
Route::post('register', 'Auth\RegisterController@register');


// Home Page
Route::get('home', 'HomeController@home')->name('home.show');
//Route::get('login', 'HomeController@login')->name('login.show');

// Events Related
Route::get('event{eventid?}', 'EventController@show')->name('event.show');

Route::get('editEvent{eventid?}', 'EventController@edit')->name('event.edit');  //edit the details of an event - display form
Route::post('updateEvent/{event_id?}', 'EventController@update')->name('updateEvent'); //update the details of an event
Route::get('createEvent', 'EventController@create')->name('event.create');  //edit the details of an event - display form
Route::post('storeEvent', 'EventController@store')->name('storeEvent'); //create a new event

Route::get('addEventUsers/{eventid?}/{userid?}', 'EventController@addUser')->name('addUser'); //update the details of an event
Route::get('removeEventUsers/{eventid?}/{userid?}', 'EventController@removeUser')->name('removeUser'); //update the details of an event

Route::get('attendEvent/{eventid?}/{userid?}', 'EventController@attendEvent')->name('attendEvent'); //make an user attend an event (add ticket) 
Route::get('leaveEvent/{eventid?}/{userid?}', 'EventController@leaveEvent')->name('leaveEvent'); //make an user leave an event (delete ticket)

// Static Pages
Route::get('aboutUs', 'PageController@aboutUs')->name('aboutUs.index');
Route::get('faq', 'PageController@faq')->name('faq.index');

Route::get('searchTest','SearchController@index')->name('search.test');
Route::post('search','SearchController@search');
Route::post('searchUsers','SearchController@searchUsers');
ROute::post('searchUsersAdmin','SearchController@searchUsersAdmin');

Route::get('user{userid?}', 'UserController@show')->name('user.show');
Route::post('updateUser/{userid?}', 'UserController@update')->name('updateUser'); //update the details of an event

//testing database data

Route::get('cities', 'CityController@index');
Route::get('countries', 'CountryController@index');
Route::get('events', 'EventController@index');

