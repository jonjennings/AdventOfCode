<?php

$contents = file( 'input.txt' );

$largest = 0;
$running = 0;

foreach ( $contents as $line ) {

	echo "processing $line\n\r";
	$line = trim( $line );
	if ( empty( $line ) ) {
		echo "Empty line\n\r";
		$largest = max( $largest, $running );
		$running = 0;
	} else {
		$running += intval( $line );
		echo "Adding to running - now $running\n\r";
	}
}
echo "Largest: $largest\n\r";
