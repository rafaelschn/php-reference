<?php

class NotaFiscal
{
	private $valor;
	private $imposto;

	public function __construct($valor, $imposto)
	{
		$this->valor = $valor;
		$this->imposto = $imposto;
	}
}
