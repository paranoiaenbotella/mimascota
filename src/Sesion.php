<?php

class Sesion
{
    public static function cerrar()
    {
        session_destroy();
        header("Location: /identificacion");
    }

    public static function definirAcierto($texto, $nombre)
    {
        $_SESSION["aciertos"][$nombre] = $texto;
    }

    public static function definirError($mensaje, $titulo)
    {
        $_SESSION["errores"][$titulo] = $mensaje;
    }

    public static function definirFormulario($campo, $valor)
    {
        $_SESSION["formulario"][$campo] = $valor;
    }

    public static function definirInvitado($invitado)
    {
        $_SESSION["invitado"] = $invitado;
    }

    public static function definirUsuario($id)
    {
        self::definirInvitado(false);
        $_SESSION["idUsuario"] = $id;
    }

    public static function esAdministrador()
    {
        $rol = new Rol();
        $rol = $rol->listarPorId(self::obtenerUsuario()->obtenerRol());
        if ($rol->obtenerNombre() === "Administrador") {
            return true;
        } else {
            return false;
        }
    }

    public static function esCuidador()
    {
        $rol = new Rol();
        $rol = $rol->listarPorId(self::obtenerUsuario()->obtenerRol());
        if ($rol->obtenerNombre() === "Cuidador") {
            return true;
        } else {
            return false;
        }
    }

    public static function esInvitado()
    {
        return self::obtenerInvitado();
    }

    public static function esPropietario()
    {
        $rol = new Rol();
        $rol = $rol->listarPorId(self::obtenerUsuario()->obtenerRol());
        if ($rol->obtenerNombre() === "Propietario") {
            return true;
        } else {
            return false;
        }
    }

    public static function existeAcierto($nombre)
    {
        return isset($_SESSION["aciertos"][$nombre]);
    }

    public static function existeError($titulo)
    {
        return isset($_SESSION["errores"][$titulo]);
    }

    public static function existeFormulario($campo)
    {
        return isset($_SESSION["formulario"][$campo]);
    }

    public static function instanciar()
    {
        session_start();
        self::instanciarInvitado();
    }

    public static function instanciarInvitado()
    {
        if (!key_exists("invitado", $_SESSION)) {
            self::definirInvitado(true);
        }
    }

    public static function limpiar()
    {
        self::limpiarErrores();
        self::limpiarFormulario();
        self::limpiarAciertos();
    }

    public static function limpiarAciertos()
    {
        unset($_SESSION["aciertos"]);
    }

    public static function limpiarErrores()
    {
        unset($_SESSION["errores"]);
    }

    public static function limpiarFormulario()
    {
        unset($_SESSION["formulario"]);
    }

    public static function obtenerAcierto($nombre)
    {
        $acierto = $_SESSION["aciertos"][$nombre];
        unset($_SESSION["aciertos"][$nombre]);
        return $acierto;
    }

    public static function obtenerError($titulo)
    {
        $error = $_SESSION["errores"][$titulo];
        unset($_SESSION["errores"][$titulo]);
        return $error;
    }

    public static function obtenerFormulario($campo)
    {
        $valor = $_SESSION["formulario"][$campo];
        unset($_SESSION["formulario"][$campo]);
        return $valor;
    }

    public static function obtenerInvitado()
    {
        return $_SESSION["invitado"];
    }

    public static function obtenerUsuario()
    {
        $usuario = new Usuario();
        return $usuario->listarPorId($_SESSION["idUsuario"]);
    }
}



