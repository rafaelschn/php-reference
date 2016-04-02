<?php

class Conta
{
	public $saldo = 0;
	public $estado;

	public function __construct()
	{
		$this->estado = new ContaEstadoPositivo();
	}

	public function saca($valor)
	{
        $this->estado->saca($this, $valor);
    }

    public function deposita($valor)
    {
    	$this->estado->deposita($this, $valor);
    }
}
