<?php
$contents = file( 'input.txt' );

$section    = array();
$first_half = true;

function _cb( $val ) {
	if ( ! empty( trim( $val ) ) ) {
		return $val;
	}
}

foreach ( $contents as $line ) {
	if ( $first_half ) {
		// reading the columns
		if ( empty( trim( $line ) ) ) {
			// we've reached the split so process the column data
			$first_half = false;

			for ( $i = 0; $i <= count( $section[0] ); $i++ ) {
				$temp = array_column( $section, $i );
				// only interested in columns that have a character in the very last place
				// those are the actual column data
				if ( ! empty( trim( end( $temp ) ) ) ) {
					array_pop( $temp );
					$columns[] = array_filter( $temp, '_cb' );
				}
			}
		} else {
			$section[] = str_split( $line );
		}
	} else {
		// reading the crate moves
		$data = explode( ' ', trim( $line ) );
		$num  = $data[1];

		for ( $i = 0; $i < $num; $i++ ) {
			$moving = array_shift( $columns[ $data[3] - 1 ] );
			array_unshift( $columns[ $data[5] - 1 ], $moving );
		}
	}
}

$tops = '';
foreach ( $columns as $column ) {
	$tops .= array_shift( $column );
}

echo "Column tops: $tops\n\r";
