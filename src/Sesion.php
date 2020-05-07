<?php

class Sesion
{
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

    public static function esInvitado()
    {
        return self::obtenerInvitado();
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
    }

    public static function limpiarErrores()
    {
        unset($_SESSION["errores"]);
    }

    public static function limpiarFormulario()
    {
        unset($_SESSION["formulario"]);
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



