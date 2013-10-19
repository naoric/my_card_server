<?php
use Naoric\Debugging\Debug;

/*
  |--------------------------------------------------------------------------
  | Main Routes
  |--------------------------------------------------------------------------
  |
  | These are the main routes to all MyCard services
  |
 */
Route::group(['before' => 'auth'], function() {
});

Route::controller('cards', 'CardController');
Route::get('images/{id}', function($id) {
    return Image::find($id)->path;
});
Route::resource('user', 'UserController', array(
    'except' => array('create', 'index', 'destroy', 'edit')
));
Route::post('login', 'UserController@login');

/**
 * -----------------------------------------------------------------------
 * For testing purposes
 * -----------------------------------------------------------------------
 */
Route::get('vtest', function() {
    return Request::url(1);
});

Route::get('token', function() {
  $email = Input::get('email');
  $user = User::byEmail($email)->first();
  $token = $user->getFirstLoginToken();
  return $token;
});

Route::post('token', function() {
  $data = Input::get('token');

  $result = User::activate($data);
  return ($result ? 'true' : 'false');
});

Route::get('/', function() {
  $result = Location::getClosestLocations([10, 10], 1);
  return Response::json($result);
});

/*
 * -----------------------------------------------------------------------
 * Routing filters
 * -----------------------------------------------------------------------
 */

