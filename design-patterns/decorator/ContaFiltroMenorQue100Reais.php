<?php

class ContaFiltroMenorQue100Reais extends ContaFiltro
{
	public function filtra($contas)
	{
		$filtradas = [];
		foreach($contas as $conta):
	  		if($conta->getValor() < 100) $filtradas[] = $conta;
		endforeach;
		foreach($this->proximo($contas) as $conta):
	    	$filtradas[] = $conta;
		endforeach;
		return $filtradas;
	}
}
