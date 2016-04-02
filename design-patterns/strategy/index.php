<?php

 function autoload($class)
 {
 	include $class . '.php';
 }
 spl_autoload_register('autoload');

$reforma = new Orcamento(500);
$calculadora = new CalculadoraImposto();
echo $calculadora->calcula($reforma, new ImpostoIcms());
echo '<hr>';
echo $calculadora->calcula($reforma, new ImpostoIss());
echo '<hr>';
echo $calculadora->calcula($reforma, new ImpostoIccc());