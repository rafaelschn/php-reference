<?php

function createGreeter($who) {
    return function() use ($who) {
    	echo "Hello $who";
	};
}

$greeter = createGreeter("World");
$greeter();

function ok(Closure $a) {
	$a();
}

ok($greeter);