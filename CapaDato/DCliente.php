<?php
include ("../CapaDato/Estrategia/Conexion.php");


class DCliente
{
    private $con;
    public function __construct()
    {
        $this->con = new Conexion();
    }
    public function Listar()
    {
        $conn = $this->con->Conectar();
        $sql = "SELECT cl.idCli as idCli, cl.nombre AS nombre, cl.telefono AS telefono, c.nombre AS ciudad  
                FROM cliente cl, ciudad c WHERE cl.idCiudad= c.id ORDER BY idCli DESC";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function ListarCiudad()
    {
        $conn = $this->con->Conectar();
        $sql = "SELECT c.id as idCiudad, c.nombre as nombreCiu FROM ciudad c";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function ListarPorId($idcli)
    {
        $conn = $this->con->Conectar();
        $sql = "select * from cliente where idCli='$idcli'";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function Insertar($nom,$telefono,$idcid)
    {
        $conn = $this->con->Conectar();
        $sql = "insert into cliente (nombre,telefono,idCiudad) values ('$nom','$telefono','$idcid')";
        $query = $conn->prepare($sql);
        $query->execute();
    }

    public function Eliminar($idcli)
    {
        $conn = $this->con->Conectar();
        $sql = "delete from cliente where idCli='$idcli'";
        $query = $conn->prepare($sql);
        $query->execute();
    }

    public function Actualizar($idcli,$nombre,$telefono,$idciu)
    {
        $conn = $this->con->Conectar();
        $sql = "update cliente set nombre ='$nombre',telefono='$telefono', idCiudad=$idciu 
                where idCli='$idcli'";
        $query = $conn->prepare($sql);
        $query->execute();
    }
}

