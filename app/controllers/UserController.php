<?php

use Naoric\Registration\Register;

class UserController extends BaseController {

  public function store() {

    $result = Register::validateUserWithResult(Input::all());

//    if ($result['status'] === 'success') {
//      $user = new User(Input::only(array('full_name', 'email', 'birth_date')));
//      $user->password = Input::get('password');
//      $user->save();
//    }
//
//    return Response::json($result);
    return Response::json($result);
  }

  public function login() {
    $user_data = Input::all();

    if (Auth::attempt([
        'email' => $user_data['email'],
        'password' => $user_data['password'],
        'active' => 1
        ], true)) {

      return Response::json(['status' => 'success']);
    }
  }

}
