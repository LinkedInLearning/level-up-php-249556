<?php
function print_array( $a ) {
	echo '<pre>';
	print_r($a);
	echo '</pre>';

}

function convert_csv_to_json( $file ) {
	$contents = file_get_contents( $file );
	$lines = explode( PHP_EOL, $contents );
	$headers = str_getcsv( array_shift( $lines ) );

	$data = array();

	foreach ($lines as $line) {

	    $row = array_combine( $headers, str_getcsv($line) );
    	$data[] = $row;
	}

	$json = json_encode( $data, JSON_PRETTY_PRINT );
	
	return $json;
}

$csv = 'customers.csv';

$json = convert_csv_to_json( $csv );

print_array( $json );