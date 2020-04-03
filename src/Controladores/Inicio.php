<?php

require_once(dirname(__DIR__) . "/Modelos/Rol.php");

class Inicio
{
    public function inicio()
    {
        $rol = new Rol();
        $rol5 = $rol->leerPorId(5);
        require_once(dirname(__DIR__) . "/Vistas/Inicio/Inicio.php");
    }
}
