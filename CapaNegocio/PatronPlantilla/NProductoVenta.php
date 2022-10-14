<?php
class NProductoVenta extends NProductoAbstract
{

    public function precioVenta($costo)
    {
        return (float)$costo * 0.13;
    }
}
