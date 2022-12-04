<?php
$contents = file( 'input.txt' );

$score = 0;

foreach ( $contents as $line ) {

	$opp  = $line[0];
	$me   = $line[2];
	$line = trim( $line );

	echo "$opp $me\n\r$line\n\r";
	switch ( $me ) {

		case 'X':
			$score += 1;
			break;
		case 'Y':
			$score += 2;
			break;
		case 'Z':
			$score += 3;
			break;
		default:
			die( "my shape error: $line\n\r" );
	}

	switch ( $line ) {
		case 'A Z':
		case 'B X':
		case 'C Y':
			$score += 0;
			break;

		case 'A X':
		case 'B Y':
		case 'C Z':
			$score += 3;
			break;

		case 'A Y':
		case 'B Z':
		case 'C X':
			$score += 6;
			break;

		default:
			die( "line error: $line\n\r" );
	}
	echo "score $score\n\r";
}
