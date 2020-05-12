<?php  

require_once(dirname(__DIR__) . "/Modelos/Opinion.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");


/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'opiniones' 
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class Opiniones extends Controlador

{

/**
 * Método que devuelve la vista
 */
	protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Opiniones";
    }


	public function getInicio(){
		$this->renderizar("Inicio.php");
	}

	
}