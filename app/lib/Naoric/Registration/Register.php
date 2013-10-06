<?php

namespace Naoric\Registration;
use Naoric\Debugging\Debug;

class Register {

	public static $user_rules = array(
		'email' => 'required|email',
		'full_name' => 'required|min:3',
		'password' => 'required|min:6',
		'birth_date' => 'date',
	);

	function __construct() {

	}

	public static function validateUser($user_data) {

		Debug::dump(self::$user_rules);
		Debug::dump($user_data);

		$validation = \Validator::make($user_data, self::$user_rules);

		return $validation;
	}

}
