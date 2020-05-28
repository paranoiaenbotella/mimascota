<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD y los métodos
 * que definen, obtienen y validan los datos.
 */

class Opinion extends Modelo
{
    private $id;

    private $usuario;

    private $anuncio;

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
     * Se crea el anuncio
     */
    public function crearAnuncio($anuncio)
    {
        if ($anuncio instanceof Anuncio) {
            $this->anuncio = $anuncio->obtenerId();
        } else {
            throw new Exception("El parámetro facilitado no es una instancia de la clase Anuncio.");
        }
    }

    /**
     * Método para definir el anuncio
     * quien comparte su opinión
     */
    public function definirAnuncio($anuncio)
    {
        $this->anuncio = (int)$anuncio;
    }

    /**
     * Se crea el usuario
     */
    public function crearUsuario($usuario)
    {
        if ($usuario instanceof Usuario) {
            $this->usuario = $usuario->obtenerId();
        } else {
            throw new Exception("El parámetro facilitado no es una instancia de la clase Usuario.");
        }
    }

    /**
     * Método para definir el usuario
     * que escribe la opinión
     */
    public function definirUsuario($usuario)
    {
        $this->usuario = (int)$usuario;
    }

/**
 * Método para definir la opinión
 */
 	public function definirMensaje($mensaje)
 	{
 		$mensajeValido = filter_var($mensaje, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		if (empty($mensajeValido)) {
			Sesion::definirError("Mensaje vacío o existe", "mensaje");

		} 	else {
			$this->mensaje = $mensajeValido;
		}
 	}

/**
 * Método para obtener el anuncio
 */
 	public function obtenerAnuncio()
 	{
		if (is_null($this->anuncio)){
		throw new Exception("El anuncio no esta definido");

		} 	else {
			return $this->anuncio;
		}
	}

/**
 * Método para obtener el cuidador
 */
 	public function obtenerUsuario()
 	{
		if (is_null($this->usuario)){
		throw new Exception("El usuario no esta definido");
        } 	else {
			return $this->usuario;
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
            "INSERT INTO `opiniones` (`id_anuncios`, `id_usuarios`, `mensaje`) VALUES (?, ?, ?)"
        );
    $consulta->bind_param("iis", $this->anuncio, $this->usuario, $this->mensaje);
    $resultado = $consulta->execute();
    $consulta->close();
    return $resultado;
}

    /**
     * Método para listar opiniones por anuncio
     */
    public function listarPorAnuncio($anuncio)
    {
        $consulta = $this->conexion->prepare("SELECT * FROM `opiniones` WHERE `id_anuncios` = ?");
        $consulta->bind_param("i", $anuncio);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            return false;
        } else {
            $opiniones = [];
            while ($fila = $resultado->fetch_assoc()) {
                $opinion = new Opinion();
                $opinion->definirId($fila["id"]);
                $opinion->definirUsuario($fila["id_usuarios"]);
                $opinion->definirAnuncio($fila["id_anuncios"]);
                $opinion->definirMensaje($fila["mensaje"]);
                array_push($opiniones, $opinion);
            }
            return $opiniones;
        }
    }

    /**
 * Método para listar opiniones por anuncio
 */
public function listarPorId($id){
    $consulta = $this->conexion->prepare("SELECT * FROM `opiniones` WHERE `id` = ?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();

        if (empty($resultado->num_rows)) {
            throw new Exception("Opinión no encontrada");
        } else{
            $opinion = new Opinion();
            $opinion->definirId($fila["id"]);
            $opinion->definirUsuario($fila["id_usuarios"]);
            $opinion->definirAnuncio($fila["id_anuncios"]);
            $opinion->definirMensaje($fila["mensaje"]);
            return $opinion;
        }
}

/**
 * Método para listar opiniones por usuario
 */
    public function listarPorUsuario($usuario){

        $consulta = $this->conexion->prepare("SELECT * FROM opiniones WHERE `id_usuarios` = ?");
        $consulta->bind_param("i", $usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)){
            return false;
        } else {
            $opiniones = [];
            while ($fila = $resultado->fetch_assoc()) {
                $opinion = new Opinion();
                $opinion->definirId($fila["id"]);
                $opinion->definirAnuncio($fila["id_anuncios"]);
                $opinion->definirUsuario($fila["id_usuarios"]);
                $opinion->definirMensaje($fila["mensaje"]);
                array_push($opiniones, $opinion);
            }
            return $opiniones;
        }
    }

/**
 * Método para actualizar las opiniones por id
 */
    public function actualizar(){

        $consulta = $this->conexion->prepare("UPDATE opiniones SET usuario = ?, anuncio = ?, mensaje = ? WHERE id = ?");
        $consulta->bind_param("iisi", $this->usuario, $this->anuncio, $this->mensaje, $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

/**
 * Método para eliminar opinión por id
 */
    public function eliminar(){
        $consulta = $this->conexion->prepare("DELETE FROM opiniones WHERE id = ?");
        $consulta->bind_param("i", $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
}
