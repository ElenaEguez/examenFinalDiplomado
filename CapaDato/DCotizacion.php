<?php
include ("../CapaDato/Conexion.php");

class DCotizacion
{
    public function Listar()
    {
        $con = new Conexion();
        $conn = $con->Conectar();
        $result = mysqli_query($conn, "SELECT  p.id, c.nombre AS nombre_cliente, cl.nombre AS nombre_clase, p.fecha, p.fecha_fin,p.costo
                                                FROM pagos p, cliente c, clase cl 
                                                WHERE p.idclase = cl.id");
        mysqli_fetch_all($result);
        return $result;
    }

    public function ListarCliente()
    {
        $con = new Conexion();
        $conn = $con->Conectar();
        $result = mysqli_query($conn, "SELECT * FROM cliente ");
        mysqli_fetch_all($result);
        return $result;
    }

    public function ListarClase()
    {
        $con = new Conexion();
        $conn = $con->Conectar();
        $result = mysqli_query($conn, "select * from clase");
        mysqli_fetch_all($result);
        return $result;
    }

    public function Insertar($codp,$costo,$fechai,$fechaf,$idclase,$idcliente)
    {
        $con = new  Conexion();
        $con = $con->Conectar();
        try {
            $con->begin_transaction();
            $sql = "insert into inscripcion (cod_pago,costo,fecha,fecha_fin,idclase) 
                           values ($codp,'$costo','$fechai','$fechaf','$idclase') ";
            //$con->query($sql);
            mysqli_query($con,$sql);
            $rs = mysqli_query($con,"SELECT MAX(id) AS id FROM pagos");
            var_dump($rs);
            if ($row = mysqli_fetch_row($rs)){
                $idpago = trim($row[0]);
            }
                $query = "insert into detalle_pagos (idpago,idcliente,costo,fecha) 
                          values ('$idpago','$idcliente','$costo','$fechai') ";
                mysqli_query($con,$query);
            //    $con->query($query);

            $con->commit();
        }catch (Exception $e){
            $con->rollback();
        }


 /*       try {
            $rt = true;
            $con->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);
            if (!$con->query("insert into pagos (cod_pago,costo,fecha,fecha_fin,idclase) 
                           values ($codp,'$costo','$fechai','$fechaf','$idclase') ")){
                $rt = false;
                $idpago = $con->insert_id;
            }
        //    $idpago = $con->query("SELECT MAX(id) AS id FROM pagos");

        //    var_dump($idpago);
            if (!$con->query("insert into detalle_pagos (idpago,idcliente,idpago,costo)
                  values ('$idpago','$idcliente','$codp','$costo','$a') ")){
                $rt = false;
            }
            if ($rt){
                $con->commit();
            }
            else{
                $con->rollback();
            }
        }
        catch (Exception $e){
            $con->rollback();
            echo  'error en la insercion',$e->getMessage(),"\n";
        }*/
    }

    public function Eliminar($id)
    {
        $con = new  Conexion();
        $con = $con->Conectar();
        $sql = "delete from temp where id='$id'";
        mysqli_query($con,$sql);
    }

}

