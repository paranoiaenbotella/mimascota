<?php


require_once(dirname(__DIR__) . "/../Modelos/TarifaTipo.php");

class TarifasTipo
{
    public function getCrear()
    {
        require_once(dirname(__DIR__) . "/../Vistas/Tarifas/Tipos/Crear.php");
    }

    public function postCrear()
    {
        if (empty($_POST["nombre"])) {
            echo("No se ha definido el nombre del tipo de tarifa.");
        } else {
            $tarifaTipo = new TarifaTipo();
            if ($tarifaTipo->insertarTipoTarifa($_POST["nombre"])) {
                header("Location: /tarifas/tipos/crear");
            } else {
                echo("No se ha podido crear el tipo de tarifa.");
            }
        }
    }
}