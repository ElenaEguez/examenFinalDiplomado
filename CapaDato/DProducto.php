<?php
include ("../CapaDato/Estrategia/Conexion.php");

class DProducto
{
    private Conexion $con;
    public function __construct()
    {
        $this->con = new Conexion();
    }
    public function Listar()
    {
        $conn = $this->con->Conectar();
        $sql = "SELECT p.id AS idP, p.nombre AS nombreP, p.costo, p.descripcion, m.nombre AS marca,costoVenta, costoDolar
                FROM producto p, marca m
                WHERE p.idMarca=m.id ORDER BY idP DESC";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function ListarMarca()
    {
        $conn = $this->con->Conectar();
        $sql = "SELECT c.id as idmarca, c.nombre as nombremarca FROM marca c";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function ListarPorId($idP)
    {
        $conn = $this->con->Conectar();
        $sql = "select * from producto where id='$idP'";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function Insertar($nombre,$precio,$descripcion,$idmarca,$costoVenta,$costodolar)
    {
        $conn = $this->con->Conectar();
        $sql = "insert into producto (nombre,costo,descripcion,idMarca,costoVenta,costoDolar) 
                values ('$nombre','$precio','$descripcion','$idmarca','$costoVenta','$costodolar')";
        $query = $conn->prepare($sql);
        $query->execute();
    }

    public function Eliminar($idcli)
    {
        $conn = $this->con->Conectar();
        $sql = "delete from producto where id='$idcli'";
        $query = $conn->prepare($sql);
        $query->execute();
    }

    public function Actualizar($idp,$nombre,$costo,$descripcion,$idm)
    {
        $conn = $this->con->Conectar();
        $sql = "update producto set nombre='$nombre',costo ='$costo',descripcion='$descripcion', idMarca='$idm' 
                where id='$idp'";
        $query = $conn->prepare($sql);
        $query->execute();
    }
}

