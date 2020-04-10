<?php

class Acceso
{
    public function getIdentificar()
    {
        require_once(dirname(__DIR__) . "/Vistas/Acceso/Identificacion.php");
    }

    public function getRegistrar()
    {
        require_once(dirname(__DIR__) . "/Vistas/Acceso/Registro.php");
    }

    public function postIdentificar()
    {
    }

    public function postRegistrar()
    {
    }
}
