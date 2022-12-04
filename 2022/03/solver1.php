<?php
$contents = file( 'input.txt' );

$sum = 0;

foreach ( $contents as $line ) {

	$line  = trim( $line );
	$len   = strlen( $line );
	$comp1 = substr( $line, 0, $len / 2 );
	$comp2 = substr( $line, $len / 2 );

	foreach ( str_split( $comp1 ) as $char ) {
		if ( false !== strpos( $comp2, $char ) ) {
			$sum  += strpos( ' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $char );
			$comp2 = str_replace( $char, '', $comp2 );
		}
	}
}
echo "score $sum\n\r";
