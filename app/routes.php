<?php

use Naoric\Debugging\Debug;

Route::group(['before' => 'auth'], function() {
  Route::resource('customer', 'CustomerController');
});

Route::controller('cards', 'CardController');

Route::get('images/{id}', function($id) {
  return Image::find($id)->path;
});

Route::resource('user', 'UserController', array(
    'except' => array('create', 'index', 'destroy', 'edit')
));
Route::get('activate', 'UserController@activate');

Route::post('login', 'UserController@login');
Route::post('sync', 'UserController@sync');

/**
 * -----------------------------------------------------------------------
 * For testing purposes
 * -----------------------------------------------------------------------
 */

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
  return 'Landing Page';
});

/*
 * -----------------------------------------------------------------------
 * Routing filters
 * -----------------------------------------------------------------------
 */

