<?php

use Naoric\Registration\Register;

class UserController extends BaseController {

  public function store() {

    $result = Register::validateUserWithResult(Input::all());

    if ($result['status'] === 'success') {
      $user = new User(Input::only(array('full_name', 'email', 'birth_date')));
      $user->password = Input::get('password');
      $user->save();
      $this->sendActivationMail($user);
    }

    return Response::json($result);
  }

  
  protected function sendActivationMail($user) {
    $query_string = '?';
    $query_string .= http_build_query([
        'token' => $user->getFirstLoginToken()
    ]);
    $url = url('activate') . $query_string;
    Mail::send('emails.auth.activation', compact('url'), 
      function($message) use ($user) {
        $message->to($user->email, $user->full_name)
          ->subject('הםעלת חשבון ב Redigo');
      });
  }
  
  public function sync() {
      if (Auth::check()) {
          return Response::json(['status' => '1']);
      }
      return Response::json(['status' => '0']);
  }

  public function login() {
    $user_data = Input::all();

    if (Auth::attempt([
          'email' => $user_data['login-email'],
          'password' => $user_data['login-password'],
          'active' => 1
        ], true)) {

      return Response::json(['status' => 'success']);
    }
    return Response::json([
        'status' => 'failed',
        'message' => 'שם משתמש או סיסמה שגויים'
    ]);
  }

  public function activate() {
    $token = Input::get('token');
    if (User::activate($token)) {
      return View::make('notifications.activation-success');
    } else {
      return View::make('notifications.activation-failed');
    }
  }

}
