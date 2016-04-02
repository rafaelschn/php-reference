<?php

class NotaFiscalGerador
{
	private $acoesAposGerarNota;

	public function __construct()
	{
		$this->acoesAposGerarNota = [];
	}

	public function addAcao(AcaoAposGerarNotaFiscal $acao)
	{
		$this->acoesAposGerarNota[] = $acao;
	}

	public function gera(Fatura $fatura)
	{
		$valor = $fatura->getValorMensal();
		$nf = new NotaFiscal($valor, $this->impostoSobreValor($valor));
		foreach($this->acoesAposGerarNota as $acao):
			$acao->executa($nf);
		endforeach;
	}

	public function impostoSobreValor($valor)
	{
		return $valor * 0.06;
	}
}
