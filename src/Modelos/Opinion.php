<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD y los métodos
 * que definen, obtienen y validan los datos.
 */

class Opinion extends Modelo 
{
	private $propietario;
	private $cuidador;
	private $mensaje;

/**
 * Métodos para definir y obtener datos
 */

 	public function definirPropietario($propietario)
 	{
 		$propietarioValido = filter_var($propietario, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		if ($propietarioValido === false) {
			throw new Exception("El propietario introducido no es valido");
		
		} 	else {
			$this->propietario = $propietarioValido;
		}
 	}

 	public function definirCuidador($cuidador)
 	{
 		$cuidadorValido = filter_var($cuidador, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		if ($cuidadorValido === false) {
			throw new Exception("El cuidador introducido no es valido");
		
		} 	else {
			$this->cuidador = $cuidadorValido;
		}
 	}

 	public function definirMensaje($mensaje)
 	{
 		$mensajeValido = filter_var($mensaje, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		if ($mensajeValido === false) {
			throw new Exception("El mensaje introducido no es valido");
		
		} 	else {
			$this->mensaje = $mensajeValido;
		}
 	}

 	public function obtenerPropietario()
 	{
		if (is_null($this->propietario)){
		throw new Exception("El propietario no esta definido");
		
		} 	else {
			return $this->propietario;
		}
	}

 	public function obtenerCuidador()
 	{
		if (is_null($this->cuidador)){
		throw new Exception("El cuidador no esta definido");
		
		} 	else {
			return $this->cuidador;
		}
	}

 	public function obtenerMensaje()
 	{
		if (is_null($this->mensaje)){
		throw new Exception("El mensaje no esta definido");
		
		} 	else {
			return $this->mensaje;
		}
	}

/**
 * Métodos que realizan las operaciones requeridas 
 * por la aplicación en la BD.
 */

}