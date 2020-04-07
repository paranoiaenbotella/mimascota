<?php


require_once(dirname(__DIR__) . "/../Modelos/AnimalTipo.php");

class AnimalesTipos
{
    public function crearTipoGet()
    {
        require_once(dirname(__DIR__) . "/../Vistas/Animales/Tipo/Crear.php");
    }

    public function crearTipoPost()
    {
        if (empty($_POST["nombre"])) {
            echo("No se ha definido el nombre del tipo de animal.");
        } else {
            $animalTipo = new AnimalTipo();
            if ($animalTipo->insertarTipoAnimal($_POST["nombre"])) {
                header("Location: /animales/tipos/crear");
            } else {
                echo("No se ha podido crear el tipo de animal.");
            }
        }
    }
}
