<?php

namespace Naoric\Debugging;

class Debug {
	public static function dump(array $arr, $return = FALSE) {
		$result = '<pre>' . print_r($arr, TRUE) . '</pre>';
		
		if ($return) {
			return $result;
		}
		
		echo $result;
	}
}
