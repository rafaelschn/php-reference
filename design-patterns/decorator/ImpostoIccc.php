<?php

class ImpostoIccc extends Imposto
{
	public function calcula(Orcamento $orcamento)
	{
		$valor = $orcamento->getValor();
		if($valor < 1000) $valor *= 0.05;
		else if($valor <= 3000) $valor *= 0.07;
		else $valor = $valor * 0.08 + 30;
		return $valor + $this->calculaOutroImposto($orcamento);
	}
}
