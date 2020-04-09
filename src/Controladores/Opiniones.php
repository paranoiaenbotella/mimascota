<?php  

require_once(dirname(__DIR__) . "/Modelos/Opinion.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'opiniones' 
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class Opiniones {

	public function getInicio(){
		require_once(dirname(__DIR__)."/Vistas/Opiniones/Inicio.php");
	}
}