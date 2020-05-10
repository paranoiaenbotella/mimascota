<?php

require_once(dirname(__DIR__) . "/Controlador.php");
require_once(dirname(__DIR__) . "/Modelos/Rol.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

/**
 * Clases para excepciones
 */
class Acceso extends Controlador
{
    protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Acceso";
    }

    public function getIdentificar()
    {
        $this->renderizar("Identificacion.php");
    }

    public function getRegistro()
    {
        $roles = new Rol();
        $roles = $roles->listarRoles();
        $this->renderizar("Registro.php", ["roles" => $roles]);
    }

    public function postIdentificar()
    {

            $usuario = new Usuario();
        if ($cuenta = $usuario->identificar($_POST["email"], $_POST["contrasena"])) {
            Sesion::definirUsuario($cuenta->obtenerId());
            header("Location: /");
        } else {
            header("Location: /identificacion");
        }
    }

    public function postRegistro()
    {
        $rol = new Rol();
        $rol = $rol->listarPorId($_POST["rol"]);
        $usuario = new Usuario();
        $usuario->definirNombre($_POST["nombre"])
            ->definirApellidos($_POST["apellidos"])
            ->definirEmail($_POST["email"])
            ->definirMovil($_POST["movil"])
            ->crearContrasena($_POST["contrasena"], $_POST["contrasena-verificada"])
            ->crearRol($rol);
        if ($usuario->insertar()) {
            Sesion::limpiarFormulario();
            header("Location: /identificacion");
        } else {
            header("Location: /registro");
        }
    }
}
