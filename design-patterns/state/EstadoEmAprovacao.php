<?php

class EstadoEmAprovacao implements OrcamentoEstado
{
	private $descontoAplicado = false;

	public function aplicaDesconto(Orcamento $orcamento)
	{
		if($this->descontoAplicado) throw new Exception('Desconto já foi dado');
		$this->descontoAplicado = true;
		$valor = $orcamento->getValor();
		$orcamento->setValor($valor - $valor * 0.02);
	}

	public function aprova(Orcamento $orcamento)
	{
		$orcamento->setEstado(new EstadoAprovado());
	}

	public function reprova(Orcamento $orcamento)
	{
		$orcamento->setEstado(new EstadoReprovado());
	}

	public function finaliza(Orcamento $orcamento)
	{
		throw new Exception('Apenas orçamentos aprovados podem ser finalizados');
	}
}
