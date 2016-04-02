<?php

class NotaFiscalObserverPrinter implements NotaFiscalObserver
{
	public function execute(NotaFiscal $nf)
	{
		echo 'Imprimido!';
	}
}
