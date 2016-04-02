<?php

class Fatura
{
	private $pagamentos;
	private $valor;
	private $pago;

	public function __construct($valor)
	{
		$this->pagamentos = [];
		$this->valor = $valor;
		$this->pago = false;
	}

	public function isPago()
	{
		return $this->pago;
	}

	public function addPagamento(Pagamento $pagamento)
	{
		$this->pagamentos[] = $pagamento;
		if($this->getTotalPagamentos() >= $this->valor) $this->pago = true;
	}

	public function getValor()
	{
		return $this->valor;
	}

	public function getTotalPagamentos()
	{
		$total = 0;
		foreach($this->pagamentos as $pagamento):
			$total += $pagamento->getValor();
		endforeach;
		return $total;
	}
}
