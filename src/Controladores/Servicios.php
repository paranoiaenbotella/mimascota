<?php

require_once(dirname(__DIR__) . "/Modelos/Servicios.php");
require_once(dirname(__DIR__) . "/Modelos/Anuncio.php");
require_once(dirname(__DIR__) . "Controlador.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'servicios'
 */
class Servicios extends Controlador{

/**
 * Método que devuelve la vista
 */
   protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Servicios";
    }

/**
 * Método que muestra el formulario
 * para crear servicios
 */
public function getCrear(){

}

/**
 * Método para controlar la inserción de los 
 * servicios en la bd
 */
public function postCrear(){


}

/**
 * Método para mostrar el formulario de edición
 * de los servicios
 */
public function getEditar(){


}

/**
 * Método para realizar la actualización 
 * del servicio
 */
public function postEditar(){


}

/**
 * Método para eliminar el servicio
 */

public function postEliminar(){


}


}