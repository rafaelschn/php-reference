<?php

class ContaEstadoPositivo implements ContaEstado
{
	public function saca(Conta $conta, $valor)
    {
        $conta->saldo -= $valor;
        if($conta->saldo < 0) $conta->estado = new ContaEstadoNegativo();
    }

	public function deposita(Conta $conta, $valor)
	{
		$conta->saldo += $valor * 0.98;
	}
}
