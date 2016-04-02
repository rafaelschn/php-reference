<?php

class CalculadoraPrecos
{
	private $tabela;
	private $frete;

	public function __construct(TabelaPreco $tabela, Frete $frete)
	{
		$this->tabela = $tabela;
		$this->frete = $frete;
	}

	public function calcula(Compra $produto)
	{
		$desconto = $this->tabela->descontoPara($produto->getValor());
		$frete = $this->frete->para($produto->getCidade());
		return $produto->getValor() * (1 - $desconto) + $frete;
	}
}
