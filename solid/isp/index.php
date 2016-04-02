<?php

//Interface segregation principle

function loadClass($className)
{
	require_once $className . '.php';
}

spl_autoload_register('loadClass');

$boletos = [new Boleto(200), new Boleto(600), new Boleto(200)];
$processador = new ProcessadorBoletos();
var_dump($processador->processa($boletos, new Fatura(1000)));
