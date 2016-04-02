<?php

date_default_timezone_set('Brazil/East');

function autoload($class)
{
	include $class . '.php';
}
spl_autoload_register('autoload');

$historico = new ContratoHistorico();
$contrato = new Contrato("Company Name", date('Y-m-d'));

echo '<pre>';

$historico->addEstado($contrato->save());
var_dump($contrato);
$contrato->avanca();

$historico->addEstado($contrato->save());
var_dump($contrato);
$contrato->avanca();

$historico->addEstado($contrato->save());
var_dump($contrato);
var_dump($historico->getEstado(0)->getContrato());
var_dump($historico->getEstado(1)->getContrato());
var_dump($historico->getEstado(2)->getContrato());

$contrato->restaura($historico->getEstado(1));
var_dump($contrato);


