<?php

class PedidoFinalizarCommand implements Command
{
	private $pedido;

	public function __construct(Pedido $pedido)
	{
		$this->pedido = $pedido;
	}

	public function execute()
	{
		$this->pedido->finalizar();
	}
}
