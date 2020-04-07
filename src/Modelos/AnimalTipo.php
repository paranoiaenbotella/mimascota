<?php

require_once(dirname(__DIR__) . "/Modelo.php");
/**
*La clase realiza las operaciones en la 
*base de datos relacionadas con tipos de animales
*/

class AnimalTipo extends Modelo {

	public function insertarTipoAnimal ($nombre){
		return $this->ejecutarConsulta(
            "INSERT INTO `animales_tipo` (`nombre`) VALUE ('$nombre')");
        );
	}
}