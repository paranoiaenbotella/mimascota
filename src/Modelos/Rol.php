<?php

require_once(dirname(__DIR__) . "/Modelo.php");

class Rol extends Modelo
{
    public function insertarRol($nombre)
    {
        return $this->ejecutarConsulta("INSERT INTO `roles` (`nombre`) VALUE ('$nombre')");
    }

    public function leerPorId($id)
    {
        return $this->ejecutarConsulta("SELECT * FROM `roles` WHERE `id` = $id");
    }
}
