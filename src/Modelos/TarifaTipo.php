<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD, los métodos
 * que definen, obtienen y validan los datos.
 */
class TarifaTipo extends Modelo
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
 */
    public function obtenerId()
    {
        if (is_null($this->id)) {
            throw new Exception("El identificador del tipo de tarifa no está definido.");
        } else {
            return $this->id;
        }
    }

/**
 * Método para definir el nombre
 */
	public function definirNombre($nombre)
	{
	$nombreValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	if ($nombreValido === false) {
		throw new Exception("El nombre introducido no es valido");
		
		} else {
			$this->nombre = $nombreValido;
		}
	}

/**
 * Método para obtener el nombre
 */
	public function obtenerNombre(){
	if (is_null($this->nombre)){
		throw new Exception("El nombre del tipo de tarifa no esta definido");
		
	} else {
		return $this->nombre;
	}
}

/**
 * Método para insertar tipo de tarifa
 */
    public function insertar()
    {
        $consulta = $this->conexion->prepare("INSERT INTO `tarifas_tipos` (`nombre`) VALUE (?)");
        $consulta->bind_param("s", $this->nombre);
        $result = $consulta->execute();
        $consulta->close();
        return $result;
    }

/**
 * Método para leer por id un tipo de tarifa
 */
	public function leerPorId($id){
		$consulta = $this->conexion->prepare("SELECT * FROM `tarifas_tipos` WHERE `id` = ?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            throw new Exception("Tipo de tarifa no encontrado");
        } else {
            $fila = $resultado->fetch_assoc();
            $tipoTarifa = new TarifaTipo();
            $tipoTarifa->definirId($fila["id"]);
            $tipoTarifa->definirNombre($fila["nombre"]);
            return $tipoTarifa;
        }
	}
/**
 * Método para listar todos los tipos de tarifas
 */
    public function listarTiposTarifas(){

    	$tiposTarifas = [];
        $resultado = $this->conexion->query("SELECT * FROM `tarifas_tipos` ORDER BY `id`");
        while ($fila = $resultado->fetch_assoc()) {
            $tipoTarifa = new TarifaTipo();
            $tipoTarifa->definirId($fila["id"]);
            $tipoTarifa->definirNombre($fila["nombre"]);
            array_push($tiposTarifas, $tipoTarifa);
        }
        return $tiposTarifas;
    }

}