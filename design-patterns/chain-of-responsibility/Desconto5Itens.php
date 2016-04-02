<?php

class Desconto5Itens implements Desconto
{
	private $proximoDesconto;

	public function calcula(Orcamento $orcamento)
	{
		if(count($orcamento->getItens()) > 5) return $orcamento->getValor() * 0.1;
		return $this->proximoDesconto->calcula($orcamento);
	}

	public function setProximoDesconto(Desconto $desconto)
	{
		$this->proximoDesconto = $desconto;
	}
}
