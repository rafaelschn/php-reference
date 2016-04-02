<?php

class ContaFiltroMaiorQue500MilReais extends ContaFiltro
{
	public function filtra($contas)
	{
		$filtradas = [];
		foreach($contas as $conta):
	  		if($conta->getValor() > 500000) $filtradas[] = $conta;
		endforeach;
		foreach($this->proximo($contas) as $conta):
	    	$filtradas[] = $conta;
		endforeach;
		return $filtradas;
	}
}
