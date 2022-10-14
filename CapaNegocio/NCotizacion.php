<?php
include_once("../CapaDato/DCotizacion.php");

class NCotizacion
{
    public function Listar()
    {
        $dato = new DCotizacion();
        return $dato->Listar();
    }

    public function ListarPorId($id)
    {
        $dato = new DCotizacion();
        return $dato->ListarPorId($id);
    }

    public function ListarCliente()
    {
        $dato = new DCotizacion();
        return $dato->ListarCliente();
    }

    public function ListarClase()
    {
        $dato = new DCotizacion();
        return $dato->ListarClase();
    }

 /*   public function Insertar($codp,$costo,$fechai,$fechaf,$idclase,$idcliente)
    {
        $dato = new DCotizacion();
        $dato->Insertar($codp,$costo,$fechai,$fechaf,$idclase,$idcliente);
    }*/

    public function Eliminar($id)
    {
        $dato = new DCotizacion();
        $dato->Eliminar($id);
    }

    public function Actualizar($id, $costo,$fechai,$fechaf,$idclase,$idcliente)
    {
        $dato = new DCotizacion();
        $dato->Actualizar($id, $costo,$fechai,$fechaf,$idclase,$idcliente);
    }
}
