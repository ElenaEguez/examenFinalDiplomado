<?php

class NAdaptador implements NTarget
{
    private $tipoCambio;
    private NAdaptado $dolar;

    public function __construct()
    {
        $this->dolar = new NAdaptado();
        $this->tipoCambio = 6.98;
    }

    public function ingresarBs($bolivianos)
    {
        $monto = $bolivianos/$this->tipoCambio;
        return $this->dolar->getDolar($monto);
    }
}
