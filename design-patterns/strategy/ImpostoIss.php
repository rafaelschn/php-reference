<?php

class ImpostoIss implements Imposto
{
	public function calcula(Orcamento $orcamento)
	{
		return $orcamento->getValor() * 0.1;
	}
}
