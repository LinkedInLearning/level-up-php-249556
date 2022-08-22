<?php 
	require_once( 'classes/class.President.php' );
	
	$usa = President::inauguration( 'Abe Lincoln', '1861-03-04' );
	$conf = President::inauguration( 'Jefferson Davis', '1862-02-22' );
	
	echo ($usa == $conf) . '<br/>';

	echo $conf->get_name();