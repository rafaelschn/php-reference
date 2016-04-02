<?php

class Item
{
	private $nome;
	private $valor;

	public function __construct($nome, $valor)
	{
		$this->valor = $valor;
		$this->nome = $nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function getValor()
	{
		return $this->valor;
	}
}
