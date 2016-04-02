<?php

class ImpostoIcms implements Imposto
{
	public function calcula(Orcamento $orcamento)
	{
		return $orcamento->getValor() * 0.05;
	}
}
