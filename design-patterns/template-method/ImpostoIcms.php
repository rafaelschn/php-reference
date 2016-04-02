<?php

class ImpostoIcms extends ImpostoTemplate
{
	protected function deveUsarMaximo(Orcamento $orcamento)
	{
		return $orcamento->getValor() > 500;
	}

	protected function taxacaoMaxima(Orcamento $orcamento)
	{
		return $orcamento->getValor() * 0.15;
	}

	protected function taxacaoMinima(Orcamento $orcamento)
	{
		return $orcamento->getValor() * 0.05;
	}
}
