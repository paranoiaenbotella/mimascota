<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD y los métodos
 * que definen, obtienen y validan los datos.
 */
class Tarifa extends Modelo
{
    private $descripcion;

    private $id;

    private $nombre;

    private $precio;

    private $usuario;

    /**
     * Se define el id
     */
    private function definirId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * Método para actualizar tarifas por id
     */
    public function actualizar()
    {
        $consulta = $this->conexion->prepare(
            "UPDATE `servicios` SET `id_usuarios` =?, `nombre` = ?, `descripcion` = ?, `precio` =? WHERE `id` = ?"
        );
        $consulta->bind_param(
            "issfi",
            $this->usuario,
            $this->nombre,
            $this->descripcion,
            $this->precio,
            $this->id
        );
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    public function crearUsuario($usuario)
    {
        if ($usuario instanceof Usuario) {
            $this->usuario = $usuario->obtenerId();
        } else {
            throw new Exception("El parámetro facilitado no es una instancia de la clase Usuario.");
        }
    }

    /**
     * Método para definir la descripcion
     */
    public function definirDescripcion($descripcion)
    {
        if (empty($descripcion) || strlen($descripcion) > 512) {
            Sesion::definirError(
                "No se ha introducido una descripción o tiene mas de 512 caracteres.",
                "descripcionServicio"
            );
        } else {
            $this->descripcion = filter_var($descripcion, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            Sesion::definirFormulario("descripcionServicio", $descripcion);
        }
        return $this;
    }

    /**
     * Método para definir el nombre
     */
    public function definirNombre($nombre)
    {
        $nombreValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($nombreValido) || strlen($nombreValido) > 64) {
            Sesion::definirError("Campo vacío o el nombre tiene mas de 64 caracteres", "nombreServicio");
        } else {
            $this->nombre = $nombreValido;
            Sesion::definirFormulario("nombreServicio", $nombre);
        }
        return $this;
    }

    /**
     * Método para definir el precio
     */
    public function definirPrecio($precio)
    {
        $precioValido = filter_var($precio, FILTER_SANITIZE_NUMBER_FLOAT);
        if ($precioValido === false) {
            throw new Exception("El precio introducido no es valido");
        } else {
            $this->precio = $precioValido;
        }
    }

    public function definirUsuario($usuario)
    {
        $usuarioValido = filter_var($usuario, FILTER_SANITIZE_NUMBER_INT);
        if (empty($usuarioValido)) {
            Sesion::definirError("Usuario no valido.", "usuario");
        } else {
            $this->usuario = $usuarioValido;
            Sesion::definirAcierto("Usuario correcto.", "usuario");
        }
    }

    /**
     * Método para eliminar tarifa por id
     */
    public function eliminar()
    {
        $consulta = $this->conexion->prepare("DELETE FROM `servicios` WHERE `id` = ?");
        $consulta->bind_param("i", $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    /**
     * Método para insertar el precio
     */
    public function insertar()
    {
        $consulta = $this->conexion->prepare(
            "INSERT INTO `servicios` (`id_usuarios`,`nombre`,`descripcion`, `precio` ) VALUES (?, ?, ?, ?)"
        );
        $consulta->bind_param("issd", $this->usuario, $this->nombre, $this->descripcion, $this->precio);
        $result = $consulta->execute();
        $consulta->close();
        return $result;
    }

    /**
     * Método para leer las servicios por usuario
     */
    public function listarPorId($id)
    {
        $consulta = $this->conexion->prepare(" SELECT * FROM `servicios` WHERE `id`= ?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            throw new Exception("Servicio no encontrado");
        } else {
            $fila = $resultado->fetch_assoc();
            $servicio = new Tarifa();
            $servicio->definirId($fila["id"]);
            $servicio->definirNombre($fila["nombre"]);
            $servicio->definirDescripcion($fila["descripcion"]);
            $servicio->definirPrecio($fila["precio"]);
            return $servicio;
        }
    }

    /**
     * Método para leer las servicios por usuario
     */
    public function listarPorUsuario($usuario)
    {
        $servicios = [];
        $consulta = $this->conexion->prepare("SELECT * FROM `servicios` WHERE `id_usuarios` =?");
        $consulta->bind_param("i", $usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        while ($fila = $resultado->fetch_assoc()) {
            $servicio = new Tarifa();
            $servicio->definirId($fila["id"]);
            $servicio->definirNombre($fila["nombre"]);
            $servicio->definirDescripcion($fila["descripcion"]);
            $servicio->definirPrecio($fila["precio"]);
            array_push($servicios, $servicio);
        }
        return $servicios;
    }

    /**
     * Método para obtener la descripción
     */
    public function obtenerDescripcion()
    {
        if (is_null($this->descripcion)) {
            throw new Exception("La descripción no esta definida.");
        } else {
            return $this->descripcion;
        }
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
     * Método para obtener el nombre
     */
    public function obtenerNombre()
    {
        if (is_null($this->nombre)) {
            throw new Exception("El nombre del servicio no esta definido");
        } else {
            return $this->nombre;
        }
    }

    /**
     * Método para obtener el precio
     */
    public function obtenerPrecio()
    {
        if (is_null($this->precio)) {
            throw new Exception("El precio no esta definido");
        } else {
            return $this->precio;
        }
    }

    public function obtenerUsuario()
    {
        if (is_null($this->usuario)) {
            Sesion::definirError("Usuario no definido.", "usuario");
        } else {
            return $this->usuario;
        }
    }
}
