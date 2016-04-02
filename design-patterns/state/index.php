<?php

function autoload($class)
{
	require_once $class . '.php';
}
spl_autoload_register('autoload');

$reforma = new Orcamento(400);
echo $reforma->getValor();
$reforma->aplicaDesconto();
echo '<hr>';
echo $reforma->getValor();
echo '<hr>';
$reforma->aprova();
$reforma->aplicaDesconto();
echo $reforma->getValor();