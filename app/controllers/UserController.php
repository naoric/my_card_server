<?php

use Naoric\Registration\Register;

class UserController extends BaseController {

  public function store() {

    $form_data = Input::except('password');

    $validator = Register::validateUser(Input::all());
    if ($validator->fails()) {
      $result = [
        'status' => 'failed',
        'messages' => $validator->messages()->all()
      ];

      return Response::json($result);
    }

    $user = new User;

    $user->password = Input::get('password');
    $user->fill($form_data);
    $user->push();

    return Response::json(['status' => 'success']);
  }

}
