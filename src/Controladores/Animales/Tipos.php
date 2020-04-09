<?php


require_once(dirname(__DIR__) . "/../Modelos/AnimalTipo.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'animales_tipos' 
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class AnimalesTipos
{   
/**
 * Método que muestra el formulario de ingreso 
 */
    public function getCrear()
    {
        require_once(dirname(__DIR__) . "/../Vistas/Animales/Tipo/Crear.php");
    }

/**
 * Mediante este método se controla la inserción del tipo de animal en la BD
 */
    public function postCrear()
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
/**
 * Mediante este método se muestra por pantalla los registros de tipos de animales
 */
    public function getListar()
    {   
        
        $animalTipo = new AnimalTipo();
        $tipoAnimal =  $animalTipo->listarTiposAnimales(); 
        require_once(dirname(__DIR__) . "/../Vistas/Animales/Tipo/Listar.php");
    }
}
