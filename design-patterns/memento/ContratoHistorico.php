<?php

class ContratoHistorico
{
	private $estados;

	public function __construct()
	{
		$this->estados = [];
	}

	public function getEstado($index)
	{
		return $this->estados[$index];
	}

	public function addEstado(ContratoEstado $estado)
	{
		$this->estados[] = $estado;
	}
}
