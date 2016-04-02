<?php

class DescontoNenhum implements Desconto
{
	public function calcula(Orcamento $orcamento)
	{
		return 0;
	}

	public function setProximoDesconto(Desconto $proximoDesconto)
	{

	}
}
