<?php

class ResponseXml implements Response
{
  private $nextResponse;
  
  public function respond(Request $request, Conta $conta)
  {
    if($request->getFormat() == ResponseFormat::XML) {
      echo "<conta><titular>" . $conta->getTitular() . "</titular><saldo>" . $conta->getSaldo() . "</saldo></conta>";
    } else {
      $this->nextResponse->respond($request, $conta);
    }
  }
      
  public function setNext(Response $response)
  {
    $this->nextResponse = $response;
  }
}
