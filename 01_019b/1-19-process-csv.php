<?php
function print_array( $a ) {
	echo '<pre>';
	print_r($a);
	echo '</pre>';

}

function convert_csv_to_json( $file ) {
	// Write this function
}

$csv = 'customers.csv';

$json = convert_csv_to_json( $csv );