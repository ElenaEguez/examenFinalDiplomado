<?php
class EstrategiaMysql implements IEstrategiaConexion
{
    public function Conectar()
    {
        $user="root";
        $pass="";
        return (new PDO('mysql:host=localhost;dbname=cotizacion', $user, $pass));
    }
}