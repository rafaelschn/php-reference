<?php

//Dependency Inversion

function loadClass($className)
{
	require_once $className . '.php';
}

spl_autoload_register('loadClass');

$fatura = new Fatura(1000);
$gerador = new NotaFiscalGerador();
$gerador->addAcao(new EnviadorEmail());
$gerador->addAcao(new NotaFiscalDao());
$gerador->gera($fatura);
