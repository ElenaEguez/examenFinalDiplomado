<?php
include_once("../CapaDato/DCliente.php");

class NCliente
{
    private $dato;
    public function __construct()
    {
        $this->dato = new DCliente();
    }

    public function Listar()
    {
        return $this->dato->Listar();
    }
    public function ListarCiudad()
    {
        return $this->dato->ListarCiudad();
    }
    public function ListarPorId($idcli)
    {
        return $this->dato->ListarPorId($idcli);
    }
    public function Insertar($nombre,$telefono,$idcid)
    {
        $this->dato->Insertar($nombre,$telefono,$idcid);
    }

    public function Eliminar($id)
    {
        $this->dato->Eliminar($id);
    }

    public function Actualizar($idcli,$nombre,$telefono,$idciu)
    {
        $this->dato->Actualizar($idcli,$nombre,$telefono,$idciu);
    }
}
