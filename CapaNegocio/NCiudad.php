<?php
include_once("../CapaDato/DCiudad.php");

class NCiudad
{
    private $dato;
    public function __construct()
    {
        $this->dato = new DCiudad();
    }

    public function Listar()
    {
        return $this->dato->Listar();
    }

    public function ListarPorId($id)
    {
        return $this->dato->ListarPorId($id);
    }

    public function Insertar($nombre)
    {
        $this->dato->Insertar($nombre);
    }

    public function Eliminar($id)
    {
        $this->dato->Eliminar($id);
    }

    public function Actualizar($id, $nombre)
    {
        $this->dato->Actualizar($id,$nombre);
    }
}
