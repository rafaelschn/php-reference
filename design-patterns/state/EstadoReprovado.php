<?php

class EstadoReprovado implements OrcamentoEstado
{
	public function aplicaDesconto(Orcamento $orcamento)
	{
		throw new Exception('Orçamento reprovado não pode receber descontos.');
	}

	public function aprova(Orcamento $orcamento)
	{
		throw new Exception('Apenas orçamentos em aprovação podem ser aprovados');
	}

	public function reprova(Orcamento $orcamento)
	{
		throw new Exception('Este orçamento já está reprovado');
	}

	public function finaliza(Orcamento $orcamento)
	{
		throw new Exception('Apenas orçamentos aprovados podem ser finalizados');
	}
}
