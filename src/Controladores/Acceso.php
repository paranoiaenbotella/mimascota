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
    }

    public function postRegistro()
    {
        $rol = new Rol();
        $rol = $rol->leerPorId($_POST["rol"]);
        $usuario = new Usuario();
        $usuario->definirEmail($_POST["email"])
            ->definirContrasena($_POST["contrasena"], $_POST["contrasena-verificada"])
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
