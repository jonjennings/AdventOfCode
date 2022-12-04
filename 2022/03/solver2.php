<?php
$contents = file( 'input.txt' );

$sum = 0;

for ( $i = 0; $i < count( $contents ); $i += 3 ) {

	$line1 = str_split( trim( $contents[ $i ] ) );
	$line2 = str_split( trim( $contents[ $i + 1 ] ) );
	$line3 = str_split( trim( $contents[ $i + 2 ] ) );

	$common = array_unique( array_intersect( $line1, $line2, $line3 ) );
	foreach ( $common as $char ) {
		$sum += strpos( ' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $char );
	}
}
echo "score $sum\n\r";
