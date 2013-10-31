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

Route::get('locations', function() {
  $pnt = Input::only(['lng', 'lat']);
  $options = Input::only(['card', 'batch', 'start']);

  $rules = [
      'lng' => 'required|numeric', // @todo Should add maximum and minimum to both
      'lat' => 'required|numeric'
  ];

  $validator = Validator::make($pnt, $rules);

  if ($validator->fails()) {
    return Response::json([
          'status' => 'failed',
          'messages' => $validator->messages()->toArray()
    ]);
  }

  return Response::json([
        'status' => 'success',
        'result' => Location::getNearby($pnt, $options)
  ]);
});


/**
 * -----------------------------------------------------------------------
 * For testing purposes
 * -----------------------------------------------------------------------
 */
Route::get('env', function() {
  return App::environment();
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
  
});

/*
 * -----------------------------------------------------------------------
 * Routing filters
 * -----------------------------------------------------------------------
 */

