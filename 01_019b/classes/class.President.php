<?php
require_once('class.Person.php');

class President extends Person {
				  
	private function __construct( $name, $dob ) {
		// private to prevent outside instantiation 
		parent::__construct( $name, $dob );
	}
	  
	public static function inauguration( $name, $dob) {
		// Define this function
	}
}