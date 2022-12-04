<?php

$contents = file( 'input.txt' );

$largest1 = 0;
$largest2 = 0;
$largest3 = 0;
$running = 0;

foreach ( $contents as $line ) {

	echo "processing $line\n\r";
	$line = trim( $line );
	if ( empty( $line ) ) {
		echo "Empty line\n\r";
		if ( $running > $largest1 ) {
			$largest3 = $largest2;
			$largest2 = $largest1;
			$largest1 = $running;
			echo "Changed 1 - now $largest1\n\r";
		} elseif ( $running > $largest2 ) {
			$largest3 = $largest2;
			$largest2 = $running;
			echo "Changed 2 - now $largest2\n\r";
		} elseif ( $running > $largest3 ) {
			$largest3 = $running;
			echo "Changed 3 - now $largest3\n\r";
		}
		$running = 0;
	} else {
		$running += intval( $line );
		echo "Adding to running - now $running\n\r";
	}
}
$largest = $largest1 + $largest2 + $largest3;
echo "Largest: $largest\n\r";
