<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD,  los métodos
 * que definen, obtienen y validan los datos.
 */
class Rol extends Modelo
{
    private $id;

    private $nombre;

    private function definirId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * Métodos para definir y obtener datos
     */
    public function definirNombre($nombre)
    {
        if (empty($nombre)) {
            throw new Exception("El nombre introducido no puede ser vacío.");
        } else {
            $this->nombre = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $this;
    }

    public function insertar()
    {
        $consulta = $this->conexion->prepare("INSERT INTO `roles` (`nombre`) VALUE (?)");
        $consulta->bind_param("s", $this->nombre);
        $result = $consulta->execute();
        $consulta->close();
        return $result;
    }

    public function leerPorId($id)
    {
        $consulta = $this->conexion->prepare("SELECT * FROM `roles` WHERE `id` = ?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            throw new Exception("Rol no encontrado");
        } else {
            $fila = $resultado->fetch_assoc();
            $rol = new Rol();
            $rol->definirId($fila["id"]);
            $rol->definirNombre($fila["nombre"]);
            return $rol;
        }
    }

    public function listarRoles()
    {
        $roles = [];
        $resultado = $this->conexion->query("SELECT * FROM `roles`");
        while ($fila = $resultado->fetch_assoc()) {
            $rol = new Rol();
            $rol->definirId($fila["id"]);
            $rol->definirNombre($fila["nombre"]);
            array_push($roles, $rol);
        }
        return $roles;
    }

    public function obtenerId()
    {
        if (is_null($this->id)) {
            throw new Exception("El identificador del rol no está definido.");
        } else {
            return $this->id;
        }
    }

    public function obtenerNombre()
    {
        if (is_null($this->nombre)) {
            throw new Exception("El nombre del rol no está definido.");
        } else {
            return $this->nombre;
        }
    }
}
