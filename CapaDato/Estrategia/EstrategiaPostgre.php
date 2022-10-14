<?php
class EstrategiaPostgre implements IEstrategiaConexion
{
    public function Conectar()
    {
         $user="postgres";
         $pass="9687";
        try {
            return (new PDO('pgsql:host=localhost;port=5432;dbname=cotizacion', $user, $pass));
        }
        catch (Exception $e){
            die("error en la conexion".$e->getMessage());
        }
    }
}