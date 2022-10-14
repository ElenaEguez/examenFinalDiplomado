<?php
include_once("../CapaDato/DEncargado.php");

class NEncargado
{
    private $dato;
    public function __construct()
    {
        $this->dato = new DEncargado();
    }

    public function Listar()
    {
        return $this->dato->Listar();
    }

    public function ListarPorId($id)
    {
        return $this->dato->ListarPorId($id);
    }

    public function Insertar($ci,$nombre,$telefono,$direccion)
    {
        $this->dato->Insertar($ci,$nombre,$telefono,$direccion);
    }

    public function Eliminar($id)
    {
        $this->dato->Eliminar($id);
    }

    public function Actualizar($id,$ci,$nombre,$telefono,$direccion)
    {
        $this->dato->Actualizar($id,$ci,$nombre,$telefono,$direccion);
    }
}
