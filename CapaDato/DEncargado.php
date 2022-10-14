<?php
include ("../CapaDato/Estrategia/Conexion.php");

class DEncargado
{
    private $con;
    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function Listar()
    {
        $conn = $this->con->Conectar();
        $sql = "SELECT * FROM encargado";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function ListarPorId($id)
    {
        $conn = $this->con->Conectar();
        $sql = "select * from encargado where idEnc='$id'";
        $query = $conn->prepare($sql);
        $query->execute();
        return  $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function Insertar($ci,$nombre,$telefono,$direccion)
    {
        $conn = $this->con->Conectar();
        $sql = "insert into encargado (ci,nombre,telefono,direccion) 
                values ('$ci','$nombre','$telefono','$direccion')";
        $query = $conn->prepare($sql);
        $query->execute();
    }

    public function Eliminar($id)
    {
        $conn = $this->con->Conectar();
        $sql = "delete from encargado where idEnc='$id'";
        $query = $conn->prepare($sql);
        $query->execute();
    }

    public function Actualizar($id,$ci,$nombre,$telefono,$direccion)
    {
        $conn = $this->con->Conectar();
        $sql = "update encargado set ci='$ci', nombre='$nombre',telefono='$telefono',direccion='$direccion'  
                where idEnc='$id'";
        $query = $conn->prepare($sql);
        $query->execute();
    }
}

