<?php

date_default_timezone_set("Brazil/East");

function autoload($class)
{
	include $class . '.php';
}
spl_autoload_register('autoload');

$date = new DateSimple();
echo $date->getDay();
echo '<br>';
echo $date->getMonth();
echo '<br>';
