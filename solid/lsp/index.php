<?php

//Liskov Subtitutive Principle: Composition over inheritance

function loadClass($className)
{
	require_once $className . '.php';
}

spl_autoload_register('loadClass');

$conta = new ContaComum();
$conta->deposita(100);
$conta->rende();
$conta->saca(70);
echo $conta->getSaldo();
echo '<br>';

$conta2 = new ContaEstudante();
$conta2->deposita(100);
$conta2->saca(70);
echo $conta2->getSaldo();
