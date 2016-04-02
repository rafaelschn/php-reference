<?php

class ContratoTipoEmAndamento implements ContratoTipo
{
	public function avanca(Contrato $contrato)
	{
		$contrato->setTipo(new ContratoTipoFinalizado());
	}
}
