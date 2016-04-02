<?php

class ResponseEmpty implements Response
{
	private $nextResponse;
    
    public function respond(Request $request, Conta $conta)
    {
        echo 'Default Response';
    }

    public function setNext(Response $response)
    {

    }
}
