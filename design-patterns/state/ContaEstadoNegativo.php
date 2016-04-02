<?php

class ContaEstadoNegativo implements ContaEstado
{
	public function saca(Conta $conta, $valor)
	{
		throw new Exception('Saldo insuficiente');
	}

	public function deposita(Conta $conta, $valor)
	{
		$conta->saldo += $valor * 0.95;
		if($conta->saldo > 0) $conta->estado = new ContaEstadoPositivo();
	}
}
