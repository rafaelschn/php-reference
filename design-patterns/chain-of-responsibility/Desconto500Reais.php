<?php

class Desconto500Reais implements Desconto
{
	private $proximoDesconto;

	public function calcula(Orcamento $orcamento)
	{
		if($orcamento->getValor() > 500) return $orcamento->getValor() * 0.05;
		return $this->proximoDesconto->calcula($orcamento);
	}

	public function setProximoDesconto(Desconto $desconto)
	{
		$this->proximoDesconto = $desconto;
	}
}
