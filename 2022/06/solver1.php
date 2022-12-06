<?php
$signal = file( 'input.txt' );
$signal = $signal[0];
define( 'MARKER_LEN', 4 );

for ( $ptr = 0; $ptr < strlen( $signal ) - MARKER_LEN; $ptr++ ) {
	$sub = substr( $signal, $ptr, MARKER_LEN );
	$set = array_unique( str_split( $sub ) );
	if ( MARKER_LEN === count( $set ) ) {
		break;
	}
}
$ptr += MARKER_LEN;
echo "Processed $ptr\n\r";
