<?php

class ImpressoraPreFixa implements Visitor
{
	public function visitaSoma(Soma $soma)
	{
		echo ' + ';
		echo '(';
		echo $soma->getLeftExpr()->aceita($this);
		echo $soma->getRightExpr()->aceita($this);
		echo ')';
	}

	public function visitaSubtracao(Subtracao $subtracao)
	{
		echo ' - ';
		echo '(';
		echo $subtracao->getLeftExpr()->aceita($this);
		echo $subtracao->getRightExpr()->aceita($this);
		echo ')';
	}

	public function visitaMultiplicacao(Multiplicacao $multiplicacao)
	{
		echo ' * ';
		echo '(';
		echo $multiplicacao->getLeftExpr()->aceita($this);
		echo $multiplicacao->getRightExpr()->aceita($this);
		echo ')';
	}

	public function visitaDivisao(Divisao $divisao)
	{
		echo ' / ';
		echo '(';
		echo $divisao->getLeftExpr()->aceita($this);
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
