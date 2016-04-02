<?php

interface Desconto
{
	public function calcula(Orcamento $orcamento);
	public function setProximoDesconto(Desconto $desconto);
}
