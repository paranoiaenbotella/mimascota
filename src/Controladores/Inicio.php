<?php

require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

class Inicio
{
    public function getInicio()
    {
        if ($_SESSION["invitado"]) {
            var_dump("Eres un invitado.");
        } else {
            var_dump("Bienvenido.");
        }
    }
}
