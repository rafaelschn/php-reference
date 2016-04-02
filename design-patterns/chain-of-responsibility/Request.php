<?php

class Request
{
	private $format;

	public function __construct($format)
	{
		$this->format = $format;
	}

	public function getFormat()
	{
		return $this->format;
	}
}
