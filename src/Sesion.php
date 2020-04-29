<?php

class Sesion
{
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

    public static function instanciar()
    {
        session_start();
        self::instanciarInvitado();
    }

    public static function instanciarInvitado()
    {
        if (!key_exists("invitado", $_SESSION)) {
            self::definirInvitado(true);
            self::instanciarUsuario();
        }
    }

    public static function instanciarUsuario()
    {
        if (!key_exists("idUsuario", $_SESSION)) {
            self::definirUsuario(0);
        }
    }

    public static function obtenerInvitado()
    {
        return $_SESSION["invitado"];
    }

    public static function obtenerUsuario()
    {
        if ($_SESSION["idUsuario"] === 0) {
            throw new Exception("El usuario no está identificado.");
        } else {
            $usuario = new Usuario();
            return $usuario->listarPorId($_SESSION["idUsuario"]);
        }
    }

    public static function definirError(){
       
    }

    public static function obtenerError(){

     
       }
    }
   

   
}