<?php

class NotaFiscalObserverDAO implements NotaFiscalObserver
{
	public function execute(NotaFiscal $nf)
	{
		echo 'Salvo!';
	}	
}
