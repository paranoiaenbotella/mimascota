<?php

require_once(dirname(__DIR__) . "/Modelo.php");

class Rol extends Modelo
{
    public $id;

    public $nombre;

    public function leerPorId($id)
    {
        return $this->ejecutarConsulta("SELECT * FROM `roles` WHERE `id` = $id");
    }
}
