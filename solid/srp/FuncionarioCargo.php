<?php

abstract class FuncionarioCargo
{
	protected $regra;

	public function __construct(RegraCalculo $regra)
	{
		$this->regra = $regra;
	}

	public function getRegra()
	{
		return $this->regra;
	}
}
