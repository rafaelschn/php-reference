<?php

class ContratoTipoFinalizado implements ContratoTipo
{
	public function avanca(Contrato $contrato)
	{
		throw new Exception('Este contrato já está finalizado');
	}
}
