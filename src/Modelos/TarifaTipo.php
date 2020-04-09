<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase realiza las operaciones en la
 * base de datos relacionadas con tipos de tarifas
 */
class TarifaTipo extends Modelo
{
/**
 * Método que inserta tipos de tarifa en la BD
 */
    public function insertarTipoTarifa($nombre)
    {
        return $this->ejecutarConsulta("INSERT INTO `tarifas_tipos` (`nombre`) VALUE ('$nombre')");
    }

/**
 * Método que lista todos los  tipos de tarifa registrados en la BD
 */
    public function listarTiposTarifas(){

    	return $this->ejecutarConsulta("SELECT * FROM `tarifas_tipos` ORDER BY `id`");
    }
}