<?php

class EstadoAprovado implements OrcamentoEstado
{
	private $descontoAplicado = false;
	
	public function aplicaDesconto(Orcamento $orcamento)
	{
		if($this->descontoAplicado) throw new Exception('Desconto já foi dado');
		$this->descontoAplicado = true;
		$valor = $orcamento->getValor();
		$orcamento->setValor($valor - $valor * 0.05);
	}

	public function aprova(Orcamento $orcamento)
	{
		throw new Exception("Este orçamento já é aprovado");
	}

	public function reprova(Orcamento $orcamento)
	{
		throw new Exception("Um orçamento aprovado não pode ser reprovado");
	}

	public function finaliza(Orcamento $orcamento)
	{
		$orcamento->setEstado(new EstadoFinalizado());
	}
}
