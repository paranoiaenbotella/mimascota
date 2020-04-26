<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD y los métodos
 * que definen, obtienen y validan los datos.
 */

class Opinion extends Modelo 
{	
	private $id;
	private $propietario;
	private $cuidador;
	private $mensaje;

/**
 * Se define y se fuerza que el tipo 
 * de la $id sea Int
 */
    private function definirId($id)
    {
        $this->id = (int)$id;
    }

/**
 * Método para obtener el id
 * Si el id es nulo se lanza una nueva excepción
 * si no, se retorna el id.
 */
    public function obtenerId()
    {
        if (is_null($this->id)) {
            throw new Exception("El identificador de la opinión no está definido.");
        } else {
            return $this->id;
        }
    }

/**
 * Se crea el propietario  
 */
public function crearPropietario($propietario){

    if ($propietario instanceof Usuario){
        $this->propietario = $propietario->obtenerId();
    } else {
        throw new Exception("El parámetro facilitado no es una instancia de la clase Usuario.");
        
    }

/**
 * Método para definir el propietario
 * quien comparte su opinión
 */
 	public function definirPropietario($propietario)
 	{
 		$this->propietario = int($propietario);
 	}

/**
 * Se crea el cuidador  
 */
public function crearCuidador($cuidador){

    if ($cuidador instanceof Usuario){
        $this->cuidador = $cuidador->obtenerId();
    } else {
        throw new Exception("El parámetro facilitado no es una instancia de la clase Usuario.");
        
    }

/**
 * Método para definir el cuidador
 * a quien va dirigida la  opinión
 */
 	public function definirCuidador($cuidador)
 	{
 		$this->cuidador = int($cuidador);
 	}

/**
 * Método para definir la opinión
 */
 	public function definirMensaje($mensaje)
 	{
 		$mensajeValido = filter_var($mensaje, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		if ($mensajeValido === false) {
			throw new Exception("El mensaje introducido no es valido");
		
		} 	else {
			$this->mensaje = $mensajeValido;
		}
 	}

/**
 * Método para obtener el propietario
 */
 	public function obtenerPropietario()
 	{
		if (is_null($this->propietario)){
		throw new Exception("El propietario no esta definido");
		
		} 	else {
			return $this->propietario;
		}
	}

/**
 * Método para obtener el cuidador
 */
 	public function obtenerCuidador()
 	{
		if (is_null($this->cuidador)){
		throw new Exception("El cuidador no esta definido");
		
		} 	else {
			return $this->cuidador;
		}
	}

/**
 * Método para obtener la opinión
 */
 	public function obtenerMensaje()
 	{
		if (is_null($this->mensaje)){
		throw new Exception("El mensaje no esta definido");
		
		} 	else {
			return $this->mensaje;
		}
	}

/**
 * Método para insertar opinión
 */
public function insertar(){
        $consulta = $this->conexion->prepare(
            "INSERT INTO `opiniones` (`propietario`, `cuidador`, `mensaje`) VALUES (?, ?, ?)");
        $consulta->bind_param("iis", $this->propietario, $this->cuidador, $this->mensaje);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;	
	}

/**
 * Método para listar opiniones por propietario
 */
public function leerPorPropietario($propietario){
		$opiniones = [];
		$consulta = $this->conexion->prepare("SELECT * FROM `opiniones` WHERE `propietario` = ?");
        $consulta->bind_param("i", $propietario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();

        while ($fila = $resultado->fetch_assoc()) {
        	$opinion = new Opinion();
        	$opinion->definirId($fila["id"]);
        	$opinion->definirCuidador($fila["cuidador"]);
        	$opinion->definirMensaje($fila["mensaje"]);
        	array_push($opiniones, $opinion);
        }
        return $opiniones;
}

/**
 * Método para listar opiniones por cuidador
 */
public function leerPorPropietario($cuidador){
		$opiniones = [];
		$consulta = $this->conexion->prepare("SELECT * FROM `opiniones` WHERE `cuidador` = ?");
        $consulta->bind_param("i", $cuidador);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();

        while ($fila = $resultado->fetch_assoc()) {
        	$opinion = new Opinion();
        	$opinion->definirId($fila["id"]);
        	$opinion->definirPropietario($fila["propietario"]);
        	$opinion->definirMensaje($fila["mensaje"]);
        	array_push($opiniones, $opinion);
        }
        return $opiniones;
}

}