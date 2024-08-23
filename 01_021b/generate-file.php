<?php
function generate_logins() {
	$logins = array( 'joe' => 'hello-there',
		'erin' => 'keep-it-secret', 
		'rob' => 'do-the-impossible',
		't' => 'i-like-anakin',
		'lou' => 'eat-everything'
	);
	
	$file_contents = '';
	foreach( $logins as $name => $pw ) {
		$file_contents .= $name . ',' . password_hash( $pw, PASSWORD_DEFAULT) . "\n";
	}
	
	file_put_contents('logins.txt', $file_contents);
}

if ( ! file_exists('logins.txt') ) {
	generate_logins();
}