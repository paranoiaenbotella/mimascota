<?php

require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

class Inicio
{
    public function getInicio()
    {
        require_once(dirname(__DIR__) . "/Vistas/Inicio/Inicio.php");
    }
}
