<?php

require_once(dirname(__DIR__) . "/Modelos/Animal.php");
require_once(dirname(__DIR__) . "/Modelos/AnimalTipo.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");
require_once(dirname(__DIR__) . "/Controlador.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'animales'
 */
class Animales extends Controlador
{

/**
 * Método que devuelve la vista
 */
   protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Animales";
    }

/**
  * Método que muestra el formulario de crear un animal
  */
    public function getCrear()
    {
    	$animalesTipo = new AnimalTipo();
    	$animalesTipo = $animalesTipo->listarTiposAnimales();
    	$usuarios = new Usuario();
        $usuarios = $usuarios->listarUsuarios();
        $this->renderizar("Crear.php", ["animalesTipo" => $animalesTipo]);
    }

/**
  * Mediante este método se muestra por pantalla los registros de animales
 */
	public function getListar()
    {
        $animal = new Animal();
        $animales = $animal->listarAnimales();
        $this->renderizar("Listar.php", ["animales"=>$animales]);
    }

 /**
   * Mediante este método se controla la inserción del animal en la bd
   */
    public function postCrear()
    {
        $animalTipo = new AnimalTipo();
        $animalTipo = $animalTipo->listarPorId($_POST["tipoAnimal"]);
        $usuario = Sesion::obtenerUsuario();
        $animal = new Animal();
        $animal->definirNombre($_POST["nombre"]);
        $animal->crearAnimalTipo($animalTipo);
        $animal->crearUsuario($usuario);
        if ($animal->insertar()) {
            Sesion::definirAcierto("Operación realizada.", "succes");
            header("Location: /animales/crear");
        } else {
            Sesion::definirError("El campo esta vacío o el nombre exite", "nombreAnimal");
            header("Location: /animales/crear");
        }
    }

/**
 * Mediante este método se muestra por pantalla el
 * formulario para editar el animal
 */
     public function getEditar()
    {
        $animal = new Animal();
        $animales = $animal->listarPorId(1);
        $this->renderizar("Editar.php", ["animales" => $animales]);

    }


}
