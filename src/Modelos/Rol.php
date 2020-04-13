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
        return $this->ejecutarConsulta("SELECT * FROM `roles` WHERE `id` = $id");
    }

    public function listarRoles()
    {
        $roles = [];
        $resultado = $this->conexion->query("SELECT * FROM `roles` ORDER BY `id`");
        while ($fila = $resultado->fetch_assoc()) {
            $rol = new Rol();
            $rol->id = $fila["id"];
            $rol->nombre = $fila["nombre"];
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
