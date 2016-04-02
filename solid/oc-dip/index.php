<?php

// Open Closed, Dependency Inversion Principles

function loadClass($className)
{
	require_once $className . '.php';
}

spl_autoload_register('loadClass');

$compra = new Compra(3000, 'SAO PAULO');
$calculadora = new CalculadoraPrecos(new TabelaPrecoPadrao(), new FreteCorreios());
echo $calculadora->calcula($compra);
