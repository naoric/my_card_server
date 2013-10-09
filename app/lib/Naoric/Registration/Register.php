<?php

namespace Naoric\Registration;

use Naoric\Debugging\Debug;
use \DateTime;

class Register {

  function __construct() {

  }

  public static function validateUser($user_data) {

    $youngest = new DateTime('-10 years');
    $oldest = new DateTime('-100 years');

    $youngest_format = $youngest->format('Y-m-d');
    $oldest_format = $oldest->format('Y-m-d');

    $user_rules = array(
      'email' => 'required|email|unique:users',
      'full_name' => 'required|min:3|max:50',
      'password' => 'required|min:6|max:30',
      'birth_date' => 'date|before:' . $youngest_format . '|after:' . $oldest_format,
    );

    $validation = \Validator::make($user_data, $user_rules);

    return $validation;
  }

}
