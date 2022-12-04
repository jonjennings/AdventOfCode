<?php
$contents = file( 'input.txt' );

$sum = 0;

foreach ( $contents as $line ) {

	// format: {elf1_start}-{elf1_end},{elf2_start}-{elf2_end}
	$sections = explode( ',', trim( $line ) );

	$elf1 = explode( '-', $sections[0] );
	$elf2 = explode( '-', $sections[1] );

	// 1st line: elf1 start is inside elf2's range
	// 2nd line: elf1 finish is inside elf2's range
	// 3rd line: elf2 start is inside elf1's range
	// 4th line: elf2 finish is inside elf1's range
	if (
		( ( $elf1[0] >= $elf2[0] ) && ( $elf1[0] <= $elf2[1] ) ) ||
		( ( $elf1[1] >= $elf2[0] ) && ( $elf1[1] <= $elf2[1] ) ) ||
		( ( $elf2[0] >= $elf1[0] ) && ( $elf2[0] <= $elf1[1] ) ) ||
		( ( $elf2[1] >= $elf1[0] ) && ( $elf2[1] <= $elf1[1] ) )
		) {
			$sum++;
	}
}
echo "score $sum\n\r";
