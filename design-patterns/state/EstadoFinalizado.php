<?php

class EstadoFinalizado implements OrcamentoEstado
{
	public function aplicaDesconto(Orcamento $orcamento)
	{
		throw new Exception('Orçamento finalizado não pode receber descontos.');
	}

	public function aprova(Orcamento $orcamento)
	{
		throw new Exception('Apenas orçamentos em aprovação podem ser aprovados');
	}

	public function reprova(Orcamento $orcamento)
	{
		throw new Exception('Orçamento finalizado não pode ser reprovado');
	}

	public function finaliza(Orcamento $orcamento)
	{
		throw new Exception('Apenas orçamentos aprovados podem ser finalizados');
	}
}
