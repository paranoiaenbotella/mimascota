<?php

require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

class Inicio
{
    public function inicio()
    {
        $usuario = new Usuario();
        $usuario->insertarPropietario("Mika", "Heya", "mikahe@tutanota.de", "123456", "foto.png");
    }
}
