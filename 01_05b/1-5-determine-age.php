<?php

class Person {
	private $name;
	private $dob;
	
	function __construct($name, $dob) {
		$this->name = $name;
		$this->dob = $dob;	
	}
	
	public function get_name() {
		return $this->name;
	}
	
	public function get_dob() {
		return $this->dob;
	}
	
	public function get_age() {
		// Challenge: define this function

	}
}



$joe = new Person('Joe', '1985-10-20');
$erin = new Person('Erin', '1991-08-28');
$teresa = new Person('Teresa', '2017-03-06');
$lou = new Person('Lou', '2020-07-12');

echo $joe->get_name() . ' is '. $joe->get_age() . '<br/>';
echo $erin->get_name() . ' is '. $erin->get_age() . '<br/>';
echo $teresa->get_name() . ' is '. $teresa->get_age() . '<br/>';
echo $lou->get_name() . ' is '. $lou->get_age();
