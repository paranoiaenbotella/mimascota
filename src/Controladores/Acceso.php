<?php

require_once(dirname(__DIR__) . "/Modelos/Rol.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

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
        require_once(dirname(__DIR__) . "/Vistas/Acceso/Registro.php");
    }

    public function postIdentificar()
    {
        $usuario = new Usuario();
        $cuenta = $usuario->listarPorEmail($_POST["email"]);
        try {
            if ($cuenta->obtenerContrasena() === sha1($_POST["contrasena"])) {
                $_SESSION["invitado"] = false;
                header("Location: /");
            }
        } catch (Exception $exception) {
            header("Location: /identificacion");
        }
    }

    public function postRegistro()
    {
        $rol = new Rol();
        $rol = $rol->leerPorId($_POST["rol"]);
        $usuario = new Usuario();
        $usuario->definirEmail($_POST["email"])
            ->crearContrasena($_POST["contrasena"], $_POST["contrasena-verificada"])
            ->definirApellidos($_POST["apellidos"])
            ->definirNombre($_POST["nombre"])
            ->definirRol($rol);
        if ($usuario->insertar()) {
            header("Location: /identificacion");
        } else {
            header("Location: /registro");
        }
    }
}
