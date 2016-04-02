<?php

class Contrato
{
	private $nome;
	private $data;
	private $tipo;

	public function __construct($nome, $data, $tipo = null)
	{
		$this->nome = $nome;
		$this->data = $data;
		$this->tipo = $tipo;
		if(is_null($this->tipo)) $this->tipo = new ContratoTipoNovo();
	}

	public function getNome() { return $this->nome; }
	public function getData() { return $this->data; }
	public function getTipo() { return $this->tipo; }

	public function setTipo(ContratoTipo $tipo)
	{
		$this->tipo = $tipo;
	}

	public function avanca()
	{
		$this->tipo->avanca($this);
	}

	public function restaura(ContratoEstado $estado)
	{
        $this->nome = $estado->getContrato()->getNome();
        $this->data = $estado->getContrato()->getData();
        $this->tipo = $estado->getContrato()->getTipo();
	}

	public function save()
	{
		return new ContratoEstado(new Contrato($this->nome, $this->data, $this->tipo));
	}
}
