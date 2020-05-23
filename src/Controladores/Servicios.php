<?php

require_once(dirname(__DIR__) . "/Modelos/Servicio.php");
require_once(dirname(__DIR__) . "/Modelos/Anuncio.php");
require_once(dirname(__DIR__) . "/Controlador.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'servicios'
 */
class Servicios extends Controlador
{
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
    public function getListar(){
        $servicio = new Servicio();
        $servicios = $servicio->listarPorUsuario(Sesion::obtenerUsuario()->obtenerId());
        $usuario = new Usuario();
        $usuario = $usuario->listarPorId(Sesion::obtenerUsuario()->obtenerId());

        $this->renderizar("Listar.php", ["servicios"=>$servicios, "usuario"=>$usuario]);
    }
    /**
     * Método que muestra el formulario
     * para crear servicios
     */
    public function getCrear()
    {
        $servicio = new Servicio();
        $servicios = $servicio->listarPorUsuario(Sesion::obtenerUsuario()->obtenerId());
        $this->renderizar("Crear.php", ["servicios" => $servicios]);
    }

    /**
     * Método para mostrar el formulario de edición
     * de los servicios
     */
    public function getEditar($id)
    {
        $usuario = Sesion::obtenerUsuario()->obtenerId();
        $servicio = new Servicio();
        $servicio = $servicio->listarPorId($id);

        $this->renderizar("Editar.php", ["servicio" => $servicio, "usuario"=>$usuario]);
    }

    /**
     * Método para controlar la inserción de los
     * servicios en la bd
     */
    public function postCrear()
    {
        $servicio = new Servicio();
        $servicio->definirNombre($_POST["nombre"]);
        $servicio->definirPrecio($_POST["precio"]);
        $servicio->definirDescripcion($_POST["descripcion"]);
        $servicio->crearUsuario(Sesion::obtenerUsuario());
        if ($servicio->insertar()) {
            header("Location: /servicios");
        } else {
            header("Location: /servicios/crear");
        }
    }

    /**
     * Método para realizar la actualización
     * del servicio
     */
    public function postEditar($id)
    {
        $usuario = Sesion::obtenerUsuario();
        $servicio = new Servicio();
        $servicio = $servicio->listarPorId($id);
        $servicio->definirNombre($_POST["nombre"]);
        $servicio->definirDescripcion($_POST["descripcion"]);
        $servicio->definirPrecio($_POST["precio"]);
        $servicio->definirUsuario($usuario->obtenerId());
        if ($servicio->actualizar()) {
            header("Location: /servicios");
        } else {
            header("Location: /servicios/editar/$id");
        }
    }

    /**
     * Método para eliminar el servicio
     */
    public function getEliminar($id)
    {
       if (Sesion::esCuidador()) {
            $servicio = new Servicio();
            $servicio = $servicio->listarPorId($id);
            if (isset($servicio) && $servicio->obtenerId() === (int)$id) {
                $servicio->eliminar();
                }
        } else {header("Location: /");}
        header("Location: /servicios");
    }
}
