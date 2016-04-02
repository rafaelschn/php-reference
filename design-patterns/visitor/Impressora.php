<?php

class Impressora implements Visitor
{
	public function visitaSoma(Soma $soma)
	{
		echo '(';
		echo $soma->getLeftExpr()->aceita($this);
		echo ' + ';
		echo $soma->getRightExpr()->aceita($this);
		echo ')';
	}

	public function visitaSubtracao(Subtracao $subtracao)
	{
		echo '(';
		echo $subtracao->getLeftExpr()->aceita($this);
		echo ' - ';
		echo $subtracao->getRightExpr()->aceita($this);
		echo ')';
	}

	public function visitaMultiplicacao(Multiplicacao $multiplicacao)
	{
		echo '(';
		echo $multiplicacao->getLeftExpr()->aceita($this);
		echo ' * ';
		echo $multiplicacao->getRightExpr()->aceita($this);
		echo ')';
	}

	public function visitaDivisao(Divisao $divisao)
	{
		echo '(';
		echo $divisao->getLeftExpr()->aceita($this);
		echo ' / ';
		echo $divisao->getRightExpr()->aceita($this);
		echo ')';
	}

	public function visitaSqrt(Sqrt $sqrt)
	{
		echo '((';
		echo $sqrt->getExpr()->aceita($this);
		echo ')^1/2)';
	}

	public function visitaNumero(Numero $numero)
	{
		echo $numero->getNumero();
	}
}
