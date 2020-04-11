<?php

require_once(dirname(__DIR__) . "/Modelo.php");
/**
*La clase realiza las operaciones en la 
*base de datos relacionadas con los animales
*/
class Animal extends Modelo
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
        throw new Exception("El nombre del animal no esta definido");
        
        }   else {
            return $this->nombre;
        }
    }

/**
 * Métodos que realizan las operaciones requeridas 
 * por la aplicación en la BD.
 */
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
