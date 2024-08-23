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
	echo '<h3>Sorting array...</h3>';

	$r = array();
	$w = array();
	$b = array();

	foreach( $flag as $marble ) {
		$$marble[] = $marble;
	}

	$flag = array_merge( $r, $w, $b );

	print_array( $flag );

}

dutch_sort( generate_array(true) );
dutch_sort( generate_array() );


