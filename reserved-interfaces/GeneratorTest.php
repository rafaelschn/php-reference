<?php

/**
 * Because generators compute their yielded values only on demand, they are useful 
 * for representing sequences that would be expensive or impossible to compute at once. 
 * These include e.g. infinite sequences and live data streams.
 * */

function xrange($min, $max) 
{
    for ($i = $min; $i <= $max; $i++) {
        yield $i;
        //yield $ke => $value;
    }
}

var_dump(xrange(1, 10));

foreach (xrange(1, 10) as $key => $value) {
	echo "$key => $value", PHP_EOL;
}

$genFileReader = function ($fileName) {
	if (!$fileHandle = fopen($fileName, 'r')) {
		return;
	}

	while (false !== $line = fgets($fileHandle)) {
		yield $line;
	}

	fclose($fileHandle);
};