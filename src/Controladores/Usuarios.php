<?php
require_once(dirname(__DIR__) . "/Controlador.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

/**
 * Controlador para el modelo Usuario
 */
class Usuarios extends Controlador
{

/**
 * Método que devuelve la vista
 */
    protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Usuarios";
    }
/**
 * Mediante este método se muestran las direcciones
 */
    public function getListar()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->listarUsuarios();
        $this->renderizar("Listar.php", ["usuarios" => $usuarios]);
    }
/**
 * Mediante este método se muestra por pantalla el
 * formulario para editar el Usuario
 */
     public function getEditar($id)
    {
        $usuario = new Usuario();
        $usuario = $usuario->listarPorId($id);
        $rol = new Rol();
        $roles = $rol->listarRoles();
        $this->renderizar("Editar.php", ["usuario" => $usuario, "roles" => $roles]);

    }
/**
 * Método para actualizar el animal
 */

    public function postEditar($id)
    {
        $usuario = new Usuario();
        $usuario = $usuario->listarPorId($_POST["id"]);
        $usuario->definirRol($_POST["rol"]);
        $usuario->definirApellidos($_POST["apellidos"]);    
        $usuario->definirNombre($_POST["nombre"]);
        $usuario->definirMovil($_POST["movil"]);
        $usuario->definirEmail($_POST["email"]);
        if ($usuario->actualizar()) {
            Sesion::definirAcierto("El usuario se ha actualizado.", "usuario");
            header("Location: /usuarios/editar/$id");
        } else {
            header("Location: /usuarios/editar/$id");
        }
    }

    }