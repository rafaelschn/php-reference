<?php

/**
 * This interface has no methods, its only purpose is to be the base interface for all traversable classes.
 * */

$items = array();
if( !is_array( $items ) && !($items instanceof Traversable) )
	throw new Exception();
