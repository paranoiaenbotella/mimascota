<?php

require_once(dirname(__DIR__) . "/Modelo.php");

class Animal extends Modelo
{
    public function insertarAnimal($idAnimalesTipo, $idUsuario, $nombre)
    {
        return $this->ejecutarConsulta(
            "INSERT INTO `animales` (`id_animales_tipos`, `id_usuarios`, `nombre`) VALUE ($idAnimalesTipo, $idUsuario, '$nombre')"
        );
    }

    public function leerPorId($id)
    {
        return $this->ejecutarConsulta("SELECT * FROM `animales` WHERE `id` = $id");
    }
}
