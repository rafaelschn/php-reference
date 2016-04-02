<?php

class Sqrt implements Expressao
{
	private $expr;

	public function __construct(Expressao $expr)
	{
		$this->expr = $expr;
	}

	public function getExpr()
	{
		return $this->expr;
	}

	public function avalia()
	{
		$val = $this->expr->avalia();
		return sqrt($val);
	}

	public function aceita(Visitor $visitor)
	{
		$visitor->visitaSqrt($this);
	}
}
