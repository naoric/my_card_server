<?php

use Naoric\Registration\Register;

class UserController extends BaseController {

  public function store() {

    $result = Register::validateUserWithResult(Input::all());

    if ($result['status'] === 'success') {
      $user = new User(Input::except('password'));
      $user->password = Input::get('password');
      $user->save();
    }

    return $result;
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
