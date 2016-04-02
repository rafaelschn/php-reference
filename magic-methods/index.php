<?php

require_once 'Construct.php';
require_once 'Overload.php';
require_once 'Serialize.php';
require_once 'Debug.php';

$object1 = new Construct();
$object2 = new Construct('abc');
$object3 = new Construct(1,2);

$overload = new Overload();
Overload::apply('param');
$overload->apply('param1', 'param2');
echo $overload;

$serialize = new Serialize();
$serialize->d = 2;
$serialize->a = 'var2';
$str = serialize($serialize);
$a = unserialize($str);
$serialize(7);
eval('$b = ' . var_export($a, true) . ';');
var_dump($b);
echo PHP_EOL;


$debug = new Debug(10);
var_dump($debug);
echo PHP_EOL;

$debugc = clone $debug;
