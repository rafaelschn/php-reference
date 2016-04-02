<?php

class HttpService
{
	public function listen(Request $request, Conta $conta)
	{
		$xml = new ResponseXml();
		$csv = new ResponseCsv();
		$percent = new ResponsePercent();
		$empty = new ResponseEmpty();
		
		$xml->setNext($csv);
		$csv->setNext($percent);
		$percent->setNext($empty);

		return $xml->respond($request, $conta);
	}
}
