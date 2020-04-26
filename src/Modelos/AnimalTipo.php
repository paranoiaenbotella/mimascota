<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD y los métodos
 * que definen, obtienen y validan los datos.
 */
class AnimalTipo extends Modelo
{
    private $id;

    private $nombre;

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
            throw new Exception("El identificador del tipo de animal no está definido.");
        } else {
            return $this->id;
        }
    }

/**
 * Método para definir nombre
 */
 	public function definirNombre($nombre)
 	{
 		$nombreValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		if ($nombreValido === false) {
			throw new Exception("El nombre introducido no es valido");

		} 	else {
			$this->nombre = $nombreValido;
		}
 	}

/**
 * Método para obtener nombre
 */
 	public function obtenerNombre(){
		if (is_null($this->nombre)){
		throw new Exception("El nombre del tipo de animal no esta definido");

		} 	else {
			return $this->nombre;
		}
	}

/**
 * Método para insertar tipos de animal
 */
    public function insertar()
    {
        $consulta = $this->conexion->prepare("INSERT INTO `animales_tipos` (`nombre`) VALUE (?)");
        $consulta->bind_param("s", $this->nombre);
        $result = $consulta->execute();
        $consulta->close();
        return $result;
    }

    /**
     * Método para listar tipos de animales por id
     */
    public function listarPorId($id)
    {
        $consulta = $this->conexion->prepare("SELECT * FROM animales_tipos WHERE id = ? ");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            throw new Exception("Tipo de animal no encontrado");
        } else {
            $fila = $resultado->fetch_assoc();
			$tipoAnimal = new AnimalTipo();
			$tipoAnimal->definirNombre($fila["id"]);
			$tipoAnimal->definirNombre($fila["nombre"]);
		}
	}

    /**
     * Método para listar todos los tipos de animales
     */
   public function listarTiposAnimales()
   {
       $animalesTipo = [];
       $resultado = $this->conexion->query("SELECT * FROM `animales_tipos` ORDER BY `id`");
        while ($fila = $resultado->fetch_assoc()) {
            $animalTipo = new AnimalTipo();
            $animalTipo->definirId($fila["id"]);
            $animalTipo->definirNombre($fila["nombre"]);
            array_push($animalesTipo, $animalTipo);
        }
       return $animalesTipo;
   }



}
