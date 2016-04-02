<?php

//Access external resources

function autoload($class)
{
	include $class . '.php';
}
spl_autoload_register('autoload');

$map = new MapBing();
$map->display();
