<?php

require_once(dirname(__DIR__) . "/Modelos/AnimalTipo.php");
require_once(dirname(__DIR__) . "/Modelos/Anuncio.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");
require_once(dirname(__DIR__) . "/Modelos/Servicio.php");
require_once(dirname(__DIR__) . "/Controlador.php");

/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'anuncios'
 */
class Anuncios extends Controlador
{
    /**
     * Método que devuelve la vista
     */
    protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Anuncios";
    }

    /**
     * Método que muestra el formulario de crear un anuncio
     */
    public function getCrear()
    {
        $servicio = new Servicio();
        $servicios = $servicio->listarPorUsuario(Sesion::obtenerUsuario()->obtenerId());
        $animalTipo = new AnimalTipo();
        $animalTipos = $animalTipo->listarTiposAnimales();
        $this->renderizar(
            "Crear.php",
            [
                "animalTipos" => $animalTipos,
                "servicios" => $servicios,
            ]
        );
    }

    /**
     * Mediante este método se muestra por pantalla el
     * formulario para editar el anuncio
     */
    public function getEditar($id)
    {
        $anuncio = new Anuncio();
        $anuncio = $anuncio->listarPorId($id);
        $servicio = new Servicio();
        $servicios = $servicio->listarPorUsuario(Sesion::obtenerUsuario()->obtenerId());
        $this->renderizar("Editar.php", ["anuncio" => $anuncio, "servicios" => $servicios]);
    }

    public function getListar()
    {
        $anuncio = new Anuncio();
        $anuncios = $anuncio->listarAnuncios();
        $this->renderizar("Listar.php", ["anuncios" => $anuncios]);
    }

    /**
     * Mediante este método se controla la inserción del anuncio en la bd
     */
    public function postCrear()
    {
        $anuncio = new Anuncio();
        $anuncio->definirUsuario(Sesion::obtenerUsuario()->obtenerId());
        $anuncio->definirDescripcion($_POST["descripcion"]);
        $anuncio->definirImagen1($_FILES["imagen1"]);
        $anuncio->definirImagen2($_FILES["imagen2"]);
        $anuncio->definirImagen3($_FILES["imagen3"]);
        $anuncio->definirImagen4($_FILES["imagen4"]);
        if ($anuncio->insertar()) {
            header("Location: /anuncios");
        } else {
            header("Location: /anuncios/crear");
        }
    }

    public function postEditar($id)
    {
        $usuario = Sesion::obtenerUsuario();
        $anuncio = new Anuncio();
        $anuncio = $anuncio->listarPorId($id);
        $anuncio->definirUsuario($usuario->obtenerId());
        $anuncio->definirServicio($_POST["servicio"]);
        $anuncio->definirDescripcion($_POST["descripcion"]);
        $anuncio->definirImagen1($_FILES["imagen1"]);
        $anuncio->definirImagen2($_FILES["imagen2"]);
        $anuncio->definirImagen3($_FILES["imagen3"]);
        $anuncio->definirImagen4($_FILES["imagen4"]);
        if ($anuncio->actualizar()) {
            header("Location: /anuncios");
        } else {
            header("Location: /anuncios/editar/$id");
        }
    }

    /**
     * Mediante este método se controla la eliminación
     * del anuncio
     */
    public function postEliminar()
    {
    }

    /**
     * Mostrar ultimos 10 anuncios publicados
     */
    
    public function getListarUltimosAnuncios(){
        $anuncio = new Anuncio();
        $anuncios = $anuncio->listarUltimosDiez();
        $this->renderizar("Ultimos.php", ["anuncios"=>$anuncios]);
    }
}
