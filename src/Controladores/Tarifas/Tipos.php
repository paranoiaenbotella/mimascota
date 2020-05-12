<?php


require_once(dirname(__DIR__) . "/../Modelos/TarifaTipo.php");
require_once(dirname(__DIR__) . "/../Controlador.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'tarifas_tipos' 
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class TarifasTipo extends Controlador
{   

/**
 * Método que devuelve la vista
 */
   protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/../Vistas/Tarifas/Tipos";
    }

/**
 * Método que muestra el formulario de 
 * crear tipos de tarifas
 */
    public function getCrear()
    {
        $this->renderizar("Crear.php");
    }
/**
 * Mediante este método se controla la inserción del tipo de tarifa en la BD
 */
    public function postCrear()
    {
       
            $tarifaTipo = new TarifaTipo();
            $tarifasTipo = $tarifaTipo->definirNombre($_POST["nombre"]);
            if ($tarifaTipo->insertar($_POST["nombre"])) {
                Sesion::definirAcierto("Operación realizada.", "succes");
                header("Location: /tarifas/tipos/crear");
            } else {
                Sesion::definirError("El campo esta vacío o el nombre exite", "nombreTipoTarifa");
                header("Location: /tarifas/tipos/crear");              
            }
    }
/**
 * Mediante este método se muestra por pantalla los registros de tipos de tarifas
 */
    public function getListar()
    {
        $tarifaTipo = new TarifaTipo();
        $tarifasTipo =  $tarifaTipo->listarTiposTarifas();
       $this->renderizar("Listar.php", ["tarifasTipo"=>$tarifasTipo]);
    }

/**
 * Método que muestra el formulario de edición
 * de tipo de tarifas
 */
    public function getEditar()
    {
        $tarifaTipo = new TarifaTipo();
        $tarifasTipo = $tarifaTipo->listarPorId(1);
        $this->renderizar("Editar.php", ["tarifasTipo" => $tarifasTipo]);

    }

}