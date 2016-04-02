<?php

interface Response
{
	public function respond(Request $request, Conta $conta);
    public function setNext(Response $response);
}
