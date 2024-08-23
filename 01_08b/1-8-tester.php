<?php
	require_once('classes/class.Person.php');
	require_once('classes/class.Student.php');
	
	function class_average( $students ) {
		$total = 0.00;
		foreach ($students as $student ) {
			$total += $student->get_gpa();
		}
		
		return $total / sizeof($students);
	}
	
	$alice = new Student('Alice', '2002-10-12', '2023', '3.45');
	$bob = new Student( 'Bob', '2005-05-04');
	$jane = new Student( 'Jane', '2007-06-01', '2028');

	echo $alice->get_name() . ' graduates in ' . $alice->get_graduation_year() . '<br/>';
	echo $bob->get_name() . ' graduates in ' . $bob->get_graduation_year() . '<br/>';
	echo $jane->get_name() . ' is ' . $jane->get_age() . ' years old. <br/>';
	$bob->set_gpa(2.79);
	$jane->set_gpa(4.0);
	
	echo '<p>The Class Average is ' . class_average([$alice, $bob, $jane]) . '</p>';
	