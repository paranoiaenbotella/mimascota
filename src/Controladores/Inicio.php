<?php

require_once(dirname(__DIR__) . "/Controlador.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

class Inicio extends Controlador
{
    protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Inicio";
    }

    public function getInicio()
    {
        $this->mostrar("Inicio.php");
    }

    public function getAviso()
    {
    	$this->renderizar("Aviso.php");
    }

    public function getContacto()
    {
        $this->renderizar("Contacto.php");
    }
}
