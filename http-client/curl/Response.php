<?php

class Response
{
	private $headers;
	private $content;
	
	public function __construct($headers = '', $content = '')
	{
		$this->headers = $headers;
		$this->content = $content;
	}
	
	public function headers()
	{
		return $this->headers;
	}
	
	public function setHeaders($headers)
	{
		$this->headers = $headers;
	}
	
	public function content()
	{
		return $this->content;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
	}
}
