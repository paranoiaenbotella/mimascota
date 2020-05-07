<?php

require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

/**
 * Mediante esta clase se controla las operaciones relacionadas con la creacion
 * y edicion del perfil del usuario facilitandose para ello la interfaz correspondiente
 */
class Perfil
{
    public function getInicio()
    {
        require_once(dirname(__DIR__) . "/Vistas/Perfil/Inicio.php");
    }

    public function getEditar()
    {
        $usuario = Sesion::obtenerUsuario();
        require_once(dirname(__DIR__) . "/Vistas/Perfil/Editar.php");
    }

    public function postEditar()
    {
        var_dump($_POST, $_FILES);
    }
}
