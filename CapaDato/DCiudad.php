<?php
include ("../CapaDato/Estrategia/Conexion.php");

class DCiudad
{
    private $con;
    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function Listar()
    {
        $conn = $this->con->Conectar();
        $sql = "SELECT * FROM ciudad";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function ListarPorId($id)
    {
        $conn = $this->con->Conectar();
        $sql = "select * from ciudad where id='$id'";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function Insertar($nom)
    {
        $conn = $this->con->Conectar();
        $sql = "insert into ciudad (nombre) values ('$nom')";
        $query = $conn->prepare($sql);
        $query->execute();
    }

    public function Eliminar($id)
    {
        $conn = $this->con->Conectar();
        $sql = "delete from ciudad where id='$id'";
        $query = $conn->prepare($sql);
        $query->execute();
    }

    public function Actualizar($id, $nombre)
    {
        $conn = $this->con->Conectar();
        $sql = "update ciudad set nombre ='$nombre' where id='$id'";
        $query = $conn->prepare($sql);
        $query->execute();
    }
}

