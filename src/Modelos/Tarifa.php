<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD y los métodos
 * que definen, obtienen y validan los datos.
 */
 class Tarifa extends Modelo
 {
 	private $id;
 	private $usuario;
 	private $tarifaTipo;
 	private $nombre;
 	private $precio;


/**
 * Se define el id
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
            throw new Exception("El identificador del tarifa no está definido.");
        } else {
            return $this->id;
        }
    } 

/**
 * Crear usuario para el registro
 */
	public function crearUsuario($usuairo)
    {
        if ($usuario instanceof Rol) {
            $this->usuario = $usuario->obtenerId();
        } else {
            throw new Exception("El parámetro facilitado no es una instancia de la clase Usuario");
        }
        return $this;
    }

/**
 * Definir usuario
 */
	public function definirUsuario($usuario){
		$this->usuario = (int)$usuario;
	}

/**
 * Obtener usuario
 */
    public function obtenerId()
    {
        if (is_null($this->usuario)) {
            throw new Exception("El identificador del usuario no está definido.");
        } else {
            return $this->usuario;
        }
    }


/**
 * Crear tipo de tarifa para el registro
 */
    public function crearTipoTarifa($tarifaTipo)
    {
        if ($tarifaTipo instanceof TarifaTipo) {
            $this->tarifaTipo = $tarifaTipo->obtenerId();
        } else {
            throw new Exception("El parámetro facilitado no es una instancia de la clase TarifaTipo");
        }
        return $this;
    } 

/**
 * Método para definir el tipo de tarifa
 */
	public function definirTarifaTipo(){
		$this->tarifaTipo = (int)$tarifaTipo;
	}

/**
 * Método para obtner el tipo de tarifa
 */
    public function obtenerTarifaTipo()
    {
        if (is_null($this->tarifaTipo)) {
            throw new Exception("El tipo de tarifa no está definido");
        } else {
            return $this->tarifaTipo;
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
		
		} 	else {
			$this->nombre = $nombreValido;
		}
 	}

/**
 * Método para obtener el nombre
 */
 	public function obtenerNombre(){
		if (is_null($this->nombre)){
		throw new Exception("El nombre del tarifa no esta definido");
		
		} 	else {
			return $this->nombre;
		}
	}


/**
 * Método para definir el precio
 */
	 	public function definirPrecio($precio)
 	{
 		$precioValido = filter_var($precio, FILTER_SANITIZE_NUMBER_FLOAT);
		if ($nombreValido === false) {
			throw new Exception("El precio introducido no es valido");
		
		} 	else {
			$this->precio = $precioValido;
		}
 	}

/**
 * Método para obtener el precio
 */
 	public function obtenerPrecio(){
		if (is_null($this->precio)){
		throw new Exception("El precio no esta definido");
		
		} 	else {
			return $this->precio;
		}
	}
/**
 * Método para insertar el precio
 */
	    public function insertar()
    {
        $consulta = $this->conexion->prepare("INSERT INTO `tarifas` (`nombre`,`precio` ) VALUES (?, ?)");
        $consulta->bind_param("sf", $this->nombre, $this->precio);
        $result = $consulta->execute();
        $consulta->close();
        return $result;
    }

/**
 * Método para leer las tarifas por tipo
 */

	public function leerPorUsuario($usuario){

		$tarifas = [];
        $consulta = $this->conexion->prepare("SELECT * FROM tarifas WHERE id_usuarios =?");
        $consulta->bind_param("i", $usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();

        while ($fila = $resultado->fetch_assoc()){

        	$tarifa = new Tarifa();
        	$tarifa->definirId($fila["id"]);
        	$tarifa->definirUsuario($fila["id_usuarios"]);
        	$tarifa->definirTarifaTipo($fila["id_tarifas_tipos"]);
        	$tarifa->definirNombre($fila["nombre"]);
        	$tarifa->definirPrecio($fila["precio"]);
        	array_push($tarifas, $tarifa);
        }
        return $tarifas;
	}
	
 }