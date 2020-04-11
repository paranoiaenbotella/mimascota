<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD,  los métodos
 * que definen, obtienen y validan los datos.
 */
class Rol extends Modelo
{
    private $nombre;

/**
 * Métodos para definir y obtener datos
 */
    public function definirNombre($nombre)
    {
        $nombreValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($nombreValido === false) {
            throw new Exception("El nombre introducido no es valido");
        
        }   else {
            $this->nombre = $nombreValido;
        }
    }

    public function obtenerNombre(){
        if (is_null($this->nombre)){
        throw new Exception("El nombre del rol no esta definido");
        
        }   else {
            return $this->nombre;
        }
    }
/**
 * Métodos que realizan las operaciones requeridas 
 * por la aplicación en la BD.
 */
    public function insertarRol($nombre)
    {
        return $this->ejecutarConsulta("INSERT INTO `roles` (`nombre`) VALUE ('$nombre')");
    }


    public function leerPorId($id)
    {
        return $this->ejecutarConsulta("SELECT * FROM `roles` WHERE `id` = $id");
    }


	public function listarRoles()
	{
		return $this->ejecutarConsulta("SELECT * FROM `roles` ORDER BY `id`");
	}
}
