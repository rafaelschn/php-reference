<?php

class ResponseCsv implements Response
{
	private $nextResponse;

	public function respond(Request $request, Conta $conta)
	{
		if($request->getFormat() == ResponseFormat::CSV) {
		  echo $conta->getTitular() .";" . $conta->getSaldo();
		} else {
		  $this->nextResponse->respond($request, $conta);
		}
	}

	public function setNext(Response $response)
	{
		$this->nextResponse = $response;
	}
}
