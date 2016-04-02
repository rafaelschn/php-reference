<?php

class Pagamento
{
	private $valor;
	private $meio;

	public function __construct($valor, $meio)
	{
		$this->valor = $valor;
		$this->meio = $meio;
	}

	public function getValor()
	{
		return $this->valor;
	}
}
