<?php

require_once(dirname(__DIR__) . "/Modelos/Rol.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

/**
 * Clases para excepciones
 */
class Acceso
{
    public function getIdentificar()
    {
        require_once(dirname(__DIR__) . "/Vistas/Acceso/Identificacion.php");
    }

    public function getRegistro()
    {
        $roles = new Rol();
        $roles = $roles->listarRoles();
        require_once(dirname(__DIR__) . "/Vistas/Acceso/RegistroIlya.php");
    }

    public function postIdentificar()
    {
        try {
            $usuario = new Usuario();
            if ($cuenta = $usuario->identificar($_POST["email"], $_POST["contrasena"])) {
                Sesion::definirUsuario($cuenta->obtenerId());
                header("Location: /");
            }
        } catch (Exception $exception) {
            Sesion::definirError($exception, "credenciales");
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
