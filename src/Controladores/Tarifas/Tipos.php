<?php


require_once(dirname(__DIR__) . "/../Modelos/TarifaTipo.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'tarifas_tipos' 
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class TarifasTipo
{   
/**
 * Método que muestra el formulario de ingreso 
 */
    public function getCrear()
    {
        require_once(dirname(__DIR__) . "/../Vistas/Tarifas/Tipos/Crear.php");
    }
/**
 * Mediante este método se controla la inserción del tipo de tarifa en la BD
 */
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
/**
 * Mediante este método se muestra por pantalla los registros de tipos de tarifas
 */
    public function getListar()
    {
        $tarifaTipo = new TarifaTipo();
        $tipoTarifa =  $tarifaTipo->listarTiposTarifas();
       require_once(dirname(__DIR__) . "/../Vistas/Tarifas/Tipos/Listar.php"); 
    }
}