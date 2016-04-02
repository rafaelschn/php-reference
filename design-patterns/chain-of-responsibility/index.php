<?php

 function autoload($class)
 {
 	include $class . '.php';
 }
 spl_autoload_register('autoload');

if(isset($_GET['request'])):
	$server = new HttpService();
	$server->listen(new Request(ResponseFormat::XML), new Conta('John Doe', 3000));
	echo '<hr>';
	$server->listen(new Request(ResponseFormat::CSV), new Conta('John Doe', 3000));
	echo '<hr>';
	$server->listen(new Request(ResponseFormat::PERCENT), new Conta('John Doe', 3000));
	echo '<hr>';
	$server->listen(new Request(''), new Conta('John Doe', 3000));
	exit;
endif;

$reforma = new Orcamento(1250);
$reforma->addItem(new Item('Tijolo', 250));
$reforma->addItem(new Item('Cimento', 250));
$reforma->addItem(new Item('Cimento', 250));
$reforma->addItem(new Item('Cimento', 250));
$reforma->addItem(new Item('Cimento', 250));
$calculadora = new CalculadoraDesconto();
echo $calculadora->calcula($reforma);