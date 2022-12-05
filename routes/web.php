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

// Authentication
Route::get('login', 'HomeController@login')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'HomeController@login')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Home Page
Route::get('home', 'HomeController@home')->name('home.show');

// Events Related
Route::get('event{eventid?}', 'EventController@show')->name('event.show');

Route::get('api/editEvent{eventid?}', 'EventController@edit')->name('event.edit');  //edit the details of an event - display form
Route::post('updateEvent/{event_id?}', 'EventController@update')->name('updateEvent'); //update the details of an event
Route::get('createEvent', 'EventController@create')->name('event.create');  //edit the details of an event - display form
Route::post('storeEvent', 'EventController@store')->name('storeEvent'); //create a new event

Route::post('addEventUsers', 'EventController@addUser')->name('addUser'); //update the details of an event
Route::post('removeEventUsers', 'EventController@removeUser')->name('removeUser'); //update the details of an event 

// Static Pages
Route::get('aboutUs', 'PageController@aboutUs')->name('aboutUs.index');
Route::get('faq', 'PageController@faq')->name('faq.index');

Route::get('searchTest','SearchController@index')->name('search.test');
Route::post('search','SearchController@search');
Route::post('searchUsers','SearchController@searchUsers');
Route::post('searchUsersAdmin','SearchController@searchUsersAdmin');
Route::get('searchEventsByTag','SearchController@searchEventsByTag')->name('searchEventsByTag');

Route::get('user{userid?}', 'UserController@show')->name('user.show');
Route::post('updateUser/{userid?}', 'UserController@update')->name('updateUser'); //update the details of an event
Route::post('selfAddUser', 'UserController@attendEvent')->name('selfAddUser');
Route::post('selfRemoveUser', 'UserController@leaveEvent')->name('selfRemoveUser');
Route::post('storeUser', 'UserController@store')->name('storeUser');

//testing database data
Route::get('cities', 'CityController@index');
Route::get('countries', 'CountryController@index');
Route::get('events', 'EventController@index');

// Comments
Route::post('storeComment', 'CommentController@store')->name('storeComment');

//Invites
Route::post('api/invite', 'InvitedController@create')->name('createInvite');
Route::put('api/inviteAccept', 'InvitedController@accept')->name('acceptInvite');
Route::delete('api/inviteReject', 'InvitedController@reject')->name('rejectInvite');

Route::get('debug/invites', function() {
    return App\Models\Invited::get();
});

/* Route::get('play', function() {
    return view('pages.play');
}); */

Route::get('auth', 'Auth\LoginController@getUser');
