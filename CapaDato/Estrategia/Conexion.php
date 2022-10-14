<?php
include_once "IEstrategiaConexion.php";
include_once "EstrategiaMysql.php";
include_once "EstrategiaPostgre.php";
class Conexion
{
    private $estrategia;
    public function __construct()
    {
        $this->setEstrategia(new EstrategiaMysql());
    }

    public function setEstrategia(IEstrategiaConexion $strategy )
    {
        $this->estrategia = $strategy;
    }

    public function Conectar()
    {
        return $this->estrategia->Conectar();
    }
}

