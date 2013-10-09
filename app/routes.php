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

use Naoric\Debugging\Debug;

Route::get('/', function() {
    // return View::make('hello');
    return 'This shit is working';
});

Route::get('images/{id}', function($id) {
    return Image::find($id)->path;
});

Route::controller('cards', 'CardController');

Route::resource('user', 'UserController', array(
    'except' => array('create', 'index', 'destroy', 'edit')
));

/**
 * For testing purposes
 */
Route::get('vtest', function() {
    return Request::url(1);
});
