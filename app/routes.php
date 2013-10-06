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

Route::get('/', function() {
	// return View::make('hello');
  return 'This shit is working';
});


/**
 * Image retriever
 */
Route::get('image.php/{id}', function($id) {
	$image = Image::findOrFail($id);
	$response = Response::make($image->image, 200, array('Content-Type' => $image->mime));
	return $response;
});

Route::controller('cards', 'CardController');