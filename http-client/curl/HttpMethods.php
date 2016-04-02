<?php

/**
 *  @see https://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html
 */
class HttpMethods
{
	const OPTIONS = 0;
	const GET = 1;
	const HEAD = 2;
	const POST = 3;
	const PUT = 4;
	const DELETE = 5;
	const TRACE = 6;
	const CONNECT = 7;
	
	private $methods = array(
	  'OPTIONS',
	  'GET',
	  'HEAD',
	  'POST',
	  'PUT',
	  'DELETE',
	  'TRACE',
	  'CONNECT'
	);
	
	public function getMethods()
	{
		return $this->methods;
	}
}
