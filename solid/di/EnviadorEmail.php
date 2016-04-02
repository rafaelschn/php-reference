<?php

class EnviadorEmail implements AcaoAposGerarNotaFiscal
{
	public function executa(NotaFiscal $nf)
	{
		echo 'Enviando Email...<br>';
	}
}
