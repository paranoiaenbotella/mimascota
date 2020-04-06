<?php

//la clase Dirección realiza las consultas relacionadas con la dirección del usuario
require_once(dirname(__DIR__) . "/Modelo.php");

class Direccion extends Modelo {

	public function insertarDireccion($pais, $ciudad, $codigo_postal, $calle, $imagen1, $imagen2, $imagen3, $imagen4)
    {
    	return $this->ejecutarConsulta("INSERT INTO 'direcciones' ('pais', 'ciudad', 'codigo_postal', 'calle', 'imagen1', 'imagen2', 'imagen3', 'imagen4', ) VALUE ('$pais', '$ciudad', '$codigo_postal', '$calle', '$imagen1', '$imagen2', '$imagen3', '$imagen4', )");
    }

    public function leerPorIdUsuario($id_usuarios)
    {
        return $this->ejecutarConsulta("SELECT * FROM `direcciones` WHERE `id_usuarios` = $id_usuarios");
    }
}