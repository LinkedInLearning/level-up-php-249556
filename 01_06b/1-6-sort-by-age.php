
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
		//Calculate age
		$dob = new Datetime($this->dob);
		$today = new Datetime(date('Y-m-d'));
		$age = $today->diff($dob);
		
		//Return Age in Years
		return $age->y;
	}
}

function print_array( $a ) {
	echo '<pre>';
	var_dump($a);
	echo '</pre>';
}

function compare_ages( $p1, $p2) {
	// Challenge: Refactor this function. 
}

$joe = new Person('Joe', '2010-10-20');
$phil = new Person('Phil', '2012-07-12');
$erin = new Person('Erin', '2009-08-28');
$teresa = new Person('Teresa', '2017-03-06');
$mike = new Person('Mike', '2005-04-07');
$lou = new Person('Lou', '2010-07-12');
$rob = new Person('Rob', '2003-12-16');
$louis = new Person('Louis', '2004-05-20');
$marie = new Person('Marie', '2010-05-25');
$bob = new Person('Bob', '2007-01-07');
$alice = new Person('Alice', '2015-11-13');
$jane = new Person('Jane', '2016-12-16');
$john = new Person('John', '2007-04-30');
$carl = new Person('Carl', '2010-03-25');

$people = [ $joe, $phil, $erin, $alice, $bob, $carl, $jane, $john, $lou, $louis, $marie, $mike, $rob, $teresa];

// Sort Here!

// Print Results
print_array( $people ); 