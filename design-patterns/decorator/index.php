<?php

 function autoload($class)
 {
 	include $class . '.php';
 }
 spl_autoload_register('autoload');

$reforma = new Orcamento(4000);
$calculadora = new CalculadoraImposto();
echo $calculadora->calcula($reforma, new ImpostoIcms());
echo '<hr>';
echo $calculadora->calcula($reforma, new ImpostoIss());
echo '<hr>';
echo $calculadora->calcula($reforma, new ImpostoIccc());
echo '<hr>';
echo $calculadora->calcula($reforma, new ImpostoIss(new ImpostoIcms()));
echo '<hr>';

$contas = [new Conta(75), new Conta(50000), new Conta(100000), new Conta(500001)];
$filtro = new ContaFiltroMenorQue100Reais(new ContaFiltroMaiorQue500MilReais());
exit(print_r($filtro->filtra($contas)));