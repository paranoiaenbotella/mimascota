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
 * Se define y se fuerza que el tipo
 * de la $id sea Int
 */
    private function definirId($id)
    {
        $this->id = (int)$id;
    }

/**
 * Método para definir el nombre de rol
 * Si la $nombre es vacio se lanza nueva
 * excepción, si no, al nombre se le aplica
 * el filtro de saneamiento y se retorna
 */
    public function definirNombre($nombre)
    {
        if (empty($nombre)) {
           Sesion::definirError("El campo está vacío o el nombre existe.", "nombreRol");
        } else {
            $this->nombre = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $this;
    }

    /**
     * Método que inserta un rol en la BD
     * Paso 1 - A la $consulta se le asigna
     * la conexion a la BD y la consulta preparada
     * de insertar utilizando prepare().
     * Paso 2 - Se vincula el parametro a la $consulta
     * mediante (bind_param)
     * Paso 3 - Se le asigna a $result el resultado
     * de la ejecución de la consulta.
     * Paso 4 - Se cierra la consulta
     * Paso 5 - Se retorna el $result.
     */
    public function insertar()
    {
        $consulta = $this->conexion->prepare("INSERT INTO `roles` (`nombre`) VALUE (?)");
        $consulta->bind_param("s", $this->nombre);
        $result = $consulta->execute();
        $consulta->close();
        return $result;
    }

    /**
     * Método que lista un rol por el ID facilitado
     * Paso 1 - Asignar a $consulta la consulta preparada
     * Paso 2 - Vincular el parametro a la $consulta
     * Paso 3 - Ejecutar la consulta
     * Paso 4 - Asignar a $resultado el resultado de la ejecución.
     * Paso 5 - Cerrar la consulta.
     * Paso 6 - Verificar si el número de filas resultante
     * de la consulta es vacio o no.
     * Si es vacio se lanza nueva excepción.
     * Si no, $fila es un array asociativo con
     * el resultado como elementos.
     * Paso 7 - Se instancia un objeto $rol
     * Paso 8 - Se define los elementos de $rol
     * mediante los metodos creados para ello
     * Paso 9 - Se retorna el objeto $rol.
     */
    public function listarPorId($id)
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

    /**
     * Método que lista todos los roles
     * menos el de Administrador
     * Se declara $roles como un array de arrays
     * Se asigna a $resultado la consulta a la BD
     * Mientras la $fila contenga resultados
     * se instancia un objeto $rol se asigna valores
     * a sus propiedades y se guarda en el array $roles.
     * La función retorna el array $roles.
     */
    public function listarRoles()
    {
        $roles = [];
        $resultado = $this->conexion->query("SELECT * FROM `roles` WHERE `nombre` != 'Administrador' ORDER BY `id`");
        while ($fila = $resultado->fetch_assoc()) {
            $rol = new Rol();
            $rol->definirId($fila["id"]);
            $rol->definirNombre($fila["nombre"]);
            array_push($roles, $rol);
        }
        return $roles;
    }

/**
 * Método para obtener el id
 * Si el id es nulo se lanza una nueva excepción
 * si no, se retorna el id.
 */
    public function obtenerId()
    {
        if (is_null($this->id)) {
            throw new Exception("El identificador del rol no está definido.");
        } else {
            return $this->id;
        }
    }

/**
 * Método para obtener el nombre
 * Si el nombre es nulo se lanza una nueva excepción
 * si no, se retorna el nombre.
 */
    public function obtenerNombre()
    {
        if (is_null($this->nombre)) {
            throw new Exception("El nombre del rol no está definido.");
        } else {
            return $this->nombre;
        }
    }

/**
 * Método para actualizar el rol por id
 */
    public function actualizar(){
        $consulta = $this->conexion->prepare("UPDATE roles SET nombre = ? WHERE id = ?");
        $consulta->bind_param("si", $this->nombre, $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

/**
 * Método para eliminar un rol por id
 */
    public function eliminar(){
        $consulta = $this->conexion->prepare("DELETE FROM `roles` WHERE `id` = ?");
        $consulta->bind_param("i", $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado; 
    }
}
