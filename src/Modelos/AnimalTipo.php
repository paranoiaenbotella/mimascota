<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase realiza las operaciones en la
 * base de datos relacionadas con tipos de animales
 */
class AnimalTipo extends Modelo
{

/**
 * Metodo que permite insertar un tipo de animal en la base de datos
 */
    public function insertarTipoAnimal($nombre)
    {
        return $this->ejecutarConsulta("INSERT INTO `animales_tipos` (`nombre`) VALUE ('$nombre')");
    }

/**
 * Metodo que permite listar todos los tipos 
 * de animales registrados  en la base de datos
 */
   public function listarTiposAnimales()
   {
   		return $this->ejecutarConsulta("SELECT * FROM `animales_tipos` ORDER BY `id`");
   }
}
