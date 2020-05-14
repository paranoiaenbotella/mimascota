<?php

require_once(dirname(__DIR__) . "/Modelos/Usuario.php");
require_once(dirname(__DIR__) . "/Controlador.php");

/**
 * Mediante esta clase se controla las operaciones relacionadas con la creacion
 * y edicion del perfil del usuario facilitandose para ello la interfaz correspondiente
 */
class Perfil extends Controlador
{

/**
 * Método que devuelve la vista
 */
    protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Perfil";
    }

    public function getInicio()
    {
        $usuario = Sesion::obtenerUsuario();
        $this->renderizar("Inicio.php", ["usuario" => $usuario]);
    }

    public function postInicio()
    {
        var_dump($_POST); // TODO: Implementar este metodo.
    }
}
