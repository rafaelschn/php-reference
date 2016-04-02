<?php

class ProcessadorBoletos
{
	public function processa($boletos, Fatura $fatura)
	{
		foreach($boletos as $boleto):
			$pagamento = new Pagamento($boleto->getValor(), MeioPagamento::BOLETO);
			$fatura->addPagamento($pagamento);
		endforeach;
		return $fatura->isPago();
	}
}
