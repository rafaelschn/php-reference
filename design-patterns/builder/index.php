<?php

date_default_timezone_set('Brazil/East');

function autoload($class)
{
	require_once $class . '.php';
}
spl_autoload_register('autoload');

$builder = new NotaFiscalBuilder();
$builder->comEmpresa('Company Name')
->comCnpj('Cnpj')
->addItem(new Item('Tijolo', 250))
->addItem(new Item('Cimento', 250))
->comObservacoes('Obs');

$nf = $builder->build();

echo '<pre>';
var_dump($nf);
