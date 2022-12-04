<?php
$contents = file( 'input.txt' );

$score = 0;

foreach ( $contents as $line ) {

	$opp    = $line[0];
	$result = $line[2];
	$line   = trim( $line );

	echo "$line\n\r";

	switch ( $result ) {
		case 'X':
			switch ( $opp ) {
				case 'A':
					$me = 'Z';
					break;
				case 'B':
					$me = 'X';
					break;
				case 'C':
					$me = 'Y';
					break;
				default:
					die( "my shape error: $line\n\r" );
			}
			break;

		case 'Y':
			switch ( $opp ) {
				case 'A':
					$me = 'X';
					break;
				case 'B':
					$me = 'Y';
					break;
				case 'C':
					$me = 'Z';
					break;
				default:
					die( "my shape error: $line\n\r" );
			}
			break;

		case 'Z':
			switch ( $opp ) {
				case 'A':
					$me = 'Y';
					break;
				case 'B':
					$me = 'Z';
					break;
				case 'C':
					$me = 'X';
					break;
				default:
					die( "my shape error: $line\n\r" );
			}
			break;

		default:
			die( "result error: $line\n\r" );

		}

		$line = "$opp $me";

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
