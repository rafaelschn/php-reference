<?php

class Orcamento
{
	private $valor;
	private $itens;
	private $estado;

	public function __construct($valor)
	{
		$this->valor = $valor;
		$this->itens = [];
		$this->estado = new EstadoEmAprovacao();
	}

	public function getValor()
	{
		return $this->valor;
	}

	public function setValor($valor)
	{
		$this->valor = $valor;
	}

	public function getItens()
	{
		return $this->itens;
	}

	public function addItem(Item $item)
	{
		$this->itens[] = $item;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setEstado(OrcamentoEstado $estado)
	{
		$this->estado = $estado;
	}

	public function aplicaDesconto()
	{
		return $this->estado->aplicaDesconto($this);
	}

	public function aprova()
	{
		$this->estado->aprova($this);
	}

	public function reprova()
	{
		$this->estado->reprova($this);
	}

	public function finaliza()
	{
		$this->estado->finaliza($this);
	}
}
