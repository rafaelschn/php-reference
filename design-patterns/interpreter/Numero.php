<?php

class Numero implements Expressao
{
	private $numero;

	public function __construct($numero)
	{
		$this->numero = $numero;
	}

	public function avalia()
	{
		return $this->numero;
	}
}
