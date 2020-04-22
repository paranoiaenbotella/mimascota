<?php

require_once(dirname(__DIR__) . "/Modelos/Rol.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'roles'
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class Roles
{
    /**
     * Método que muestra el formulario de ingreso
     */
    public function getCrear()
    {
        require_once(dirname(__DIR__) . "/Vistas/Roles/Crear.php");
    }

    /**
     * Mediante este método se muestra por pantalla los registros de tipos de roles
     */
    public function getListar()
    {
        $rol = new Rol();
        $roles = $rol->listarRoles();
        require_once(dirname(__DIR__) . "/Vistas/Roles/Listar.php");
    }

    /**
     * Mediante este método se controla la inserción del tipo de rol en la BD
     */
    public function postCrear()
    {
        if (empty($_POST["nombre"])) {
            echo("No se ha definido el nombre del rol.");
        } else {
            $rol = new Rol();
            if ($rol->insertarRol($_POST["nombre"])) {
                header("Location: /roles/crear");
            } else {
                echo("No se ha podido crear el rol.");
            }
        }
    }
}
