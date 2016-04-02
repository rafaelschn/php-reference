<?php

class CalculadoraSalario
{
	public function calcula(Funcionario $funcionario)
	{
		return $funcionario->getSalarioLiquido();
	}
}
