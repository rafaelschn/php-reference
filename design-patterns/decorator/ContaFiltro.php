<?php

abstract class ContaFiltro
{
  protected $outroFiltro;

  function __construct(ContaFiltro $outroFiltro = null)
  {
    $this->outroFiltro = $outroFiltro;
  }

  public abstract function filtra($contas);

  protected function proximo($contas)
  {
    if(is_null($this->outroFiltro)) return [];
    return $this->outroFiltro->filtra($contas);
  }
}
