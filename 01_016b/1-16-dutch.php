<?php

function generate_array( $test = false ) {
	if ( $test ) {
		return explode(' ', 'r b w b w r r w b r w b r b b w w w');
	}
	
	$flag = array();
	$choices = ['r', 'w', 'b'];
	
	$i = 0;
	while( $i <= 50 ) {
		$flag[$i] = $choices[array_rand($choices)];
		$i++;
	}
	
	shuffle($flag);
	
	return $flag;
}

function print_array( $a ) {
	echo '<pre>';
	print_r( $a ); 
	echo '</pre>';
}

function dutch_sort( $flag ) {
	// Challenge: define this function

}

dutch_sort( generate_array(true) );
dutch_sort( generate_array() );


