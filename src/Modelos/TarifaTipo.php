<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase realiza las operaciones en la
 * base de datos relacionadas con tipos de tarifas
 */
class TarifaTipo extends Modelo
{
    public function insertarTipoTarifa($nombre)
    {
        return $this->ejecutarConsulta("INSERT INTO `tarifas_tipos` (`nombre`) VALUE ('$nombre')");
    }
}