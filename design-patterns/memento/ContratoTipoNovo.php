<?php

class ContratoTipoNovo implements ContratoTipo
{
	public function avanca(Contrato $contrato)
	{
		$contrato->setTipo(new ContratoTipoEmAndamento());
	}	
}
