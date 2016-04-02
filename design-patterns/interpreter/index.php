<?php

function autoload($class)
{
	include $class . '.php';
}
spl_autoload_register('autoload');

$left = new Soma(new Numero(1), new Numero(3));
$right = new Subtracao(new Numero(2), new Numero(1));

$soma = new Divisao(new Multiplicacao(new Soma($left, $right), new Numero(3)), new Numero(15));
echo $soma->avalia();
echo '<br>';
echo (new Sqrt(new Numero(4)))->avalia();
