<?php
include_once("../CapaDato/DProducto.php");

class NProducto
{
    private $dato;
    public function __construct()
    {
        $this->dato = new DProducto();
    }

    public function Listar()
    {
        return $this->dato->Listar();
    }
    public function ListarMarca()
    {
        return $this->dato->ListarMarca();
    }
    public function ListarPorId($idcli)
    {
        return $this->dato->ListarPorId($idcli);
    }
    public function Insertar($nombre,$precio,$descripcion,$idmarca,$costoVenta,$costodolar)
    {
        $this->dato->Insertar($nombre,$precio,$descripcion,$idmarca,$costoVenta,$costodolar);
    }

    public function Eliminar($id)
    {
        $this->dato->Eliminar($id);
    }

    public function Actualizar($idp,$nombre,$costo,$descripcion,$idm)
    {
        $this->dato->Actualizar($idp,$nombre,$costo,$descripcion,$idm);
    }
}
