<?php 

namespace Naoric\Registration;

class Register {

	public static $userRules = array(
		'email' => 'required|email',
		'full_name' => 'required|min:3',
		'password' => 'required|min:6',
		'birth_date' => 'date|before:-1 year|after:-100 year',
	);

  function __construct() {

  }

  public function validateUser() {
    $userData = Input::all();
		
		$validation = \Validator::make(
			$userData,
			self::$userRules
		);
		
		return $validation;
  }

}