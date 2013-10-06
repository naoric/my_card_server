<?php 

namespace Naoric\Registration;

class Register {

	public static $userRules = array(
		'email' => 'required|email',
		'full_name' => 'required|min:3',
		
		
	);

  function __construct() {

  }

  public function validateUser() {
    $userData = Input::all();
		
		
  }

}