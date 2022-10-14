<?php
abstract class NProductoAbstract
{

    abstract public function precioVenta($costo);

    public function precioTotal($costo)
    {
        $total = $this->precioVenta($costo) + $costo;
        return $total;
    }


}