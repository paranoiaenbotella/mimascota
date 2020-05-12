<?php

require_once(dirname(__DIR__) . "/Controlador.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");

/**
 * Controlador para el modelo Direcciones
 */
class Direcciones extends Controlador
{
	
/**
 * Método que devuelve la vista
 */
    protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Direcciones";
    }

/**
 * Método que muestra el formulario para 
 * crear direcciones
 */
   public function getCrear()
{
	$this->renderizar("Crear.php");
}

/**
 * Mediante este método se controla la inserción 
 * de las direcciones en la bd
 */
    public function postCrear()
    {
       
   
    }

/**
 * Mediante este método se muestra por pantalla los registros de direcciones
 */
    public function getListar()
    {
        
       $this->renderizar("Listar.php");
    }

}