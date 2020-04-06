<?php

require_once(dirname(__DIR__) . "/Modelo.php");

class Animal extends Modelo
{
    public function insertarAnimal($nombre)
    {
        return $this->ejecutarConsulta("INSERT INTO `animales` (`nombre`) VALUE ('$nombre')");
    }

    public function leerPorId($id)
    {
        return $this->ejecutarConsulta("SELECT * FROM `animales` WHERE `id` = $id");
    }
}