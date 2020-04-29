<?php

require_once(dirname(__DIR__) . "/Modelos/Rol.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

/**
 * Clases para excepciones
 */
class correoElectronico extends Exception{};
class contrasena extends Exception{};

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
        try {
            $usuario = new Usuario();
             if (!($cuenta = $usuario->listarPorEmail($_POST["email"]))){
                throw new correoElectronico("Correo electrónico incorrecto");
                
             } elseif(!($cuenta->obtenerContrasena() === sha1($_POST["contrasena"]))){
                throw new contrasena("Contraseña incorrecta.");               
             }
            else {
                Sesion::definirUsuario($cuenta->obtenerId());
                header("Location: /");
            }

        } catch (correoElectronico $exception) {
            Sesion::definirError( "correoElectronico", $exception->getMessage());
            header("Location: /identificacion");
        } catch (contrasena $exception) {
            Sesion::definirError( "contrasena", $exception->getMessage());
            header("Location: /identificacion");
        }
    }
    public function postRegistro()
    {
        $rol = new Rol();
        $rol = $rol->listarPorId($_POST["rol"]);
        $usuario = new Usuario();
        $usuario->definirEmail($_POST["email"])
            ->crearContrasena($_POST["contrasena"], $_POST["contrasena-verificada"])
            ->definirApellidos($_POST["apellidos"])
            ->definirNombre($_POST["nombre"])
            ->crearRol($rol);
        if ($usuario->insertar()) {
            header("Location: /identificacion");
        } else {
            header("Location: /registro");
        }
    }
}
