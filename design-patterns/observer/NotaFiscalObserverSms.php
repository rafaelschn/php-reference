<?php

class NotaFiscalObserverSms implements NotaFiscalObserver
{
	public function execute(NotaFiscal $nf)
	{
		echo 'Sms Sent!';
	}
}
