<?php

class Fatura
{
	private $valorMensal;

	public function __construct($valorMensal)
	{
		$this->valorMensal = $valorMensal;
	}

	public function getValorMensal()
	{
		return $this->valorMensal;
	}
}
