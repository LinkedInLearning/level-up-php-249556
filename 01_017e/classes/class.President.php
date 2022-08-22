<?php
require_once('class.Person.php');

class President extends Person {

	private static $potus;
				  
	private function __construct( $name, $dob ) {
		// private to prevent outside instantiation 
		parent::__construct( $name, $dob );
	}
	  
	public static function inauguration( $name, $dob) {
		if ( ! isset( self::$potus ) ) {
			self::$potus = new President( $name, $dob );
		}

		return self::$potus;
	}
}