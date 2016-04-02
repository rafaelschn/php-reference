<?php

//Single Responsibility Principle

function loadClass($className)
{
	require_once $className . '.php';
}

spl_autoload_register('loadClass');

$dev = new Funcionario(new FuncionarioCargoDesenvolvedor(new RegraDezOuVintePorcento()), 3100);
$tes = new Funcionario(new FuncionarioCargoTester(new RegraQuinzeOuVinteCincoPorcento()), 3100);
$dba = new Funcionario(new FuncionarioCargoDba(new RegraQuinzeOuVinteCincoPorcento()), 3100);
$calculadora = new CalculadoraSalario();
echo 'DEV: ' . $calculadora->calcula($dev);
echo '<br>';
echo 'TESTER: ' . $calculadora->calcula($tes);
echo '<br>';
echo 'DBA: ' . $calculadora->calcula($dba);
