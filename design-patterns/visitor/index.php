<?php

function autoload($class)
{
	include $class . '.php';
}
spl_autoload_register('autoload');

$impressora = new Impressora();
$impressoraPre = new ImpressoraPreFixa();

$left = new Soma(new Numero(1), new Numero(3));
$right = new Subtracao(new Numero(2), new Numero(1));

$op = new Soma(new Soma($left, $right), new Numero(20));
$op->aceita($impressora);
echo ' = ';
echo $op->avalia();
echo '<br>';
$op->aceita($impressoraPre);
