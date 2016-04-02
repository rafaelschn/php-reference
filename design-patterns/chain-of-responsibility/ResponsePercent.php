<?php

class ResponsePercent implements Response
{
	private $nextResponse;
    
    public function respond(Request $request, Conta $conta)
    {
        if($request->getFormat() == ResponseFormat::PERCENT) {
          echo $conta->getTitular() . "%" . $conta->getSaldo();
        } else {
          $this->nextResponse->respond($request, $conta);
        }
    }

    public function setNext(Response $response)
    {
    	$this->nextResponse = $response;
    }
}
