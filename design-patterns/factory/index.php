<?php

function autoload($class)
{
	include $class . '.php';
}
spl_autoload_register('autoload');

$factory = new ConnectionFactory();
$connection = $factory->getConnection();

var_dump($connection);
