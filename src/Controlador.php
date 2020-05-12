<?php

abstract class Controlador
{
    abstract protected function obtenerDirectorioVistas();

    public function renderizar($vista, $datos = [])
    {
        require_once(__DIR__ . "/Vistas/Plantilla.php");
    }

    public function mostrar($vista)
    {
        require_once(sprintf("%s/%s", $this->obtenerDirectorioVistas(), $vista));
    }
}
