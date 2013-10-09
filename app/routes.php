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


Route::group(['before' => 'auth'], function() {
  Route::controller('cards', 'CardController');
});


Route::get('/', function() {
    // return View::make('hello');
    return 'This shit is working';
});

Route::get('images/{id}', function($id) {
    return Image::find($id)->path;
});


Route::resource('user', 'UserController', array(
    'except' => array('create', 'index', 'destroy', 'edit')
));

Route::post('login', 'UserController@login');
/**
 * For testing purposes
 */
Route::get('vtest', function() {
    return Request::url(1);
});


/*
 * -----------------------------------------------------------------------
 * Routing filters
 * -----------------------------------------------------------------------
 */

