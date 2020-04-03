<?php

require_once(dirname(__DIR__) . "/Modelos/Rol.php");

class Inicio
{
    public function inicio()
    {
        $rol = new Rol();
        $rol1 = $rol->insertarRol("Mika");
        require_once(dirname(__DIR__) . "/Vistas/Inicio/Inicio.php");
    }
}
