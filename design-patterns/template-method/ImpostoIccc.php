<?php

class ImpostoIccc implements Imposto
{
	public function calcula(Orcamento $orcamento)
	{
		$valor = $orcamento->getValor();
		if($valor < 1000) return $valor * 0.05;
		if($valor <= 3000) return $valor * 0.07;
		return $valor * 0.08 + 30;
	}
}
