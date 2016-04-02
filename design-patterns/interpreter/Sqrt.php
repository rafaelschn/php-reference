<?php

class Sqrt implements Expressao
{
	private $expr;

	public function __construct(Expressao $expr)
	{
		$this->expr = $expr;
	}

	public function avalia()
	{
		$val = $this->expr->avalia();
		return sqrt($val);
	}
}
