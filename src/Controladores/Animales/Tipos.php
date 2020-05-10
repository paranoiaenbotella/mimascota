<?php

require_once(dirname(__DIR__) . "/../Modelos/AnimalTipo.php");
require_once(dirname(__DIR__) . "/../Controlador.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'animales_tipos'
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class AnimalesTipos extends Controlador
{
    protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/../Vistas/Animales/Tipo";
    }

    /**
     * Método que muestra el formulario de ingreso
     */
    public function getCrear()
    {
        $this->renderizar("Crear.php");
    }

    /**
     * Mediante este método se muestra por pantalla los registros de tipos de animales
     */
    public function getListar()
    {
        $animalTipo = new AnimalTipo();
        $animalesTipo = $animalTipo->listarTiposAnimales();
        $this->renderizar("Listar.php", ["animalesTipo" => $animalesTipo]);
    }

    /**
     * Mediante este método se controla la inserción del tipo de animal en la BD
     */
    public function postCrear()
    {
        $animalTipo = new AnimalTipo();
        $animalTipo->definirNombre($_POST["nombre"]);
        if ($animalTipo->insertar()) {
            Sesion::definirAcierto("Operación realizada.", "succes");
            header("Location: /animales/tipos/crear");
        } else {
            Sesion::definirError("El campo está vacío o el nombre existe.", "nombreTipoAnimal");
            header("Location: /animales/tipos/crear");
        }
    }
}
