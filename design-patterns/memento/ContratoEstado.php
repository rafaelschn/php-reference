<?php

class ContratoEstado
{
	private $contrato;
	private $date;

	public function __construct(Contrato $contrato)
	{
		$this->contrato = $contrato;
		$this->date = date('Y-m-d h:i:s');
	}

	public function getContrato()
	{
		return $this->contrato;
	}
}
