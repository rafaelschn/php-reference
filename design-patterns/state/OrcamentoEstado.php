<?php

interface OrcamentoEstado
{
	public function aplicaDesconto(Orcamento $orcamento);
	public function aprova(Orcamento $orcamento);
	public function reprova(Orcamento $orcamento);
	public function finaliza(Orcamento $orcamento);
}
