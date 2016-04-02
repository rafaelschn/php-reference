<?php

class CalculadoraDesconto
{
	public function calcula(Orcamento $orcamento)
	{
		$desconto5Itens = new Desconto5Itens();
		$desconto500Reais = new Desconto500Reais();
		$descontoNenhum = new DescontoNenhum();
		
		$desconto5Itens->setProximoDesconto($desconto500Reais);
		$desconto500Reais->setProximoDesconto($descontoNenhum);

		return $desconto5Itens->calcula($orcamento);
	}
}
