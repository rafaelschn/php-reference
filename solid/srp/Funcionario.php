<?php

class Funcionario
{
	protected $salario;
	protected $cargo;

	public function __construct(FuncionarioCargo $cargo, $salario)
	{
		$this->salario = $salario;
		$this->cargo = $cargo;
	}

	public function getSalario()
	{
		return $this->salario;
	}

	public function getCargo()
	{
		return $this->cargo;
	}

	public function getSalarioLiquido()
	{
		return $this->cargo->getRegra()->calcula($this);
	}
}
