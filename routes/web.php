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

Route::get('search','SearchController@search');
Route::get('searchUsers','SearchController@searchUsers')->name('searchUsers');
Route::get('searchUsersAdmin','SearchController@searchUsersAdmin')->name('searchUsersAdmin');
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
Route::post('deleteComment', 'CommentController@deleteComment')->name('deleteComment');
Route::get('getComments', 'CommentController@getComments')->name('getComments');
// Upvotes
Route::post('addUpvote', 'UpvoteController@addUpvote')->name('addUpvote');
Route::post('removeUpvote', 'UpvoteController@removeUpvote')->name('removeUpvote');


//Invites
Route::post('api/invite', 'InvitedController@create')->name('createInvite');
Route::put('api/inviteAccept', 'InvitedController@accept')->name('acceptInvite');
Route::delete('api/inviteReject', 'InvitedController@reject')->name('rejectInvite');
Route::put('api/clearNotifications', 'InvitedController@read')->name('readNotifications');
Route::get('api/numberNotifications', 'InvitedController@numberNotifications')->name('numberNotifications');

Route::put('api/changeBlockStatus', 'UserController@block')->name('changeBlockStatusUser');

Route::get('auth', 'Auth\LoginController@getUser');
