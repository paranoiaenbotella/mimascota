<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase realiza las operaciones en la
 * base de datos relacionadas con los roles
 */
class Rol extends Modelo
{
/**
 * Método que inserta roles en la BD
 */
    public function insertarRol($nombre)
    {
        return $this->ejecutarConsulta("INSERT INTO `roles` (`nombre`) VALUE ('$nombre')");
    }

/**
 * Método que muestra el rol según el id facilitado
 */
    public function leerPorId($id)
    {
        return $this->ejecutarConsulta("SELECT * FROM `roles` WHERE `id` = $id");
    }

/**
 * Método que lista todos los roles registrados en la BD
 */
	public function listarRoles()
	{
		return $this->ejecutarConsulta("SELECT * FROM `roles` ORDER BY `id`");
	}
}
