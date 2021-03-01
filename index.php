<?php

/*
 * Complete the cookies function below.
 */

/**
 * @param $k
 * @param $A
 *
 * @return int
 */
function cookies( $k, $A ) {
	$heap = new SplMinHeap();
	foreach ( $A as $value ) {
		$heap->insert( $value );
	}
	$step = 0;
	do {
		$step ++;
        
		if ( $heap->count() < 2 ) {
			return - 1;
		}
        
		$firstCookie = $heap->current();
		$heap->next();
		$secondCookie = $heap->current();
		$heap->next();
		$newCookie = 1 * $firstCookie + 2 * $secondCookie;
		$heap->insert( $newCookie );
	} while ( checkIfAllCoockiesIsBiggerThanSomeValue( $k, $heap ) );

	return $step;
}

/**
 * @param $value
 * @param $heap
 *
 * @return bool
 */
function checkIfAllCoockiesIsBiggerThanSomeValue( $value, $heap ) {
	$result = false;
	do {
		if ( $heap->current() < $value ) {
			$result = true;
		}
	} while ( $heap->next() );

	return $result;
}

$fptr = fopen( getenv( "OUTPUT_PATH" ), "w" );

$stdin = fopen( "php://stdin", "r" );

fscanf( $stdin, "%[^\n]", $nk_temp );
$nk = explode( ' ', $nk_temp );

$n = intval( $nk[0] );

$k = intval( $nk[1] );

fscanf( $stdin, "%[^\n]", $A_temp );

$A = array_map( 'intval', preg_split( '/ /', $A_temp, - 1, PREG_SPLIT_NO_EMPTY ) );

$result = cookies( $k, $A );

fwrite( $fptr, $result . "\n" );

fclose( $stdin );
fclose( $fptr );
