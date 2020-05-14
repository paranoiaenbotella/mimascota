<?php

require_once(dirname(__DIR__) . "/Modelos/Rol.php");
require_once(dirname(__DIR__) . "/Controlador.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'roles'
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class Roles extends Controlador
{


/**
 * Método que devuelve la vista
 */
   protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Roles";
    }

    /**
     * Método que muestra el formulario de crear Rol
     */
    public function getCrear()
    {
        $this->renderizar("Crear.php");
    }

    /**
     * Mediante este método se muestra por pantalla los registros de tipos de roles
     */
    public function getListar()
    {
        $rol = new Rol();
        $roles = $rol->listarRoles();
        $this->renderizar("Listar.php", ["roles"=>$roles]);
    }

    /**
     * Mediante este método se controla la inserción del tipo de rol en la BD
     */
    public function postCrear()
    {
            $rol = new Rol();
            $roles = $rol->definirNombre($_POST["nombre"]);
            if ($rol->insertar()) {
                Sesion::definirAcierto("Operación realizada.", "succes");
                header("Location: /roles/crear");
            } else {
                Sesion::definirError("El campo esta vacío o el nombre exite", "nombreRol");
                header("Location: /roles/crear");
            }
    }

    /**
     * Mediante este método se muestra por pantalla el
     * formulario para editar el rol
     */
    public function getEditar($id)
    {
        $rol = new Rol();
        $rol = $rol->listarPorId($id);
        $this->renderizar("Editar.php", ["rol" => $rol]);
    }

    public function postEditar($id)
    {
        $rol = new Rol();
        $rol = $rol->listarPorId($id);
        $rol->definirNombre($_POST["nombre"]);
        if ($rol->actualizar()) {
            Sesion::definirAcierto("El rol se ha actualizado.", "nombreRol");
            header("Location: /roles/editar/$id");
        } else {
            header("Location: /roles/editar/$id");
        }
    }
}
