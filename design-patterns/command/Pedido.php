<?php

class Pedido
{
	private $cliente;
	private $preco;
	private $status;

	public function __construct($cliente, $preco)
	{
		$this->cliente = $cliente;
		$this->preco = $preco;
		$this->status = new PedidoStatusNovo();
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function pagar()
	{
		$this->status = new PedidoStatusPago();
	}

	public function finalizar()
	{
		$this->status = new PedidoStatusFinalizado();
	}
}
