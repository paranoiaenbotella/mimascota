<?php

require_once(dirname(__DIR__) . "/Modelos/Opinion.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");
require_once(dirname(__DIR__) . "/Modelos/Anuncio.php");
require_once(dirname(__DIR__) . "/Controlador.php");

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

    /**
     * Mostrar formulario para
     * editar opiniones
     */
    public function getEditar($id)
    {
        $usuario = Sesion::obtenerUsuario()->obtenerId();
        $opinion = new Opinion();
        $opinion = $opinion->listarPorId($id);
        $this->renderizar("Editar.php", ["usuario" => $usuario, "opinion" => $opinion]);
    }

    /**
     * Eliminar opiniones
     */
    public function getEliminar($id)
    {
        if ((Sesion::esPropietario()) || (Sesion::esAdministrador())) {
            $opinion = new Opinion();
            $opinion = $opinion->listarPorId($id);
            if (isset($opinion) && $opinion->obtenerId() === (int)$id) {
                $opinion->eliminar();
            }
        } else {
            header("Location: /");
        }
        header("Location: /opiniones");
    }

    /**
     * Eliminar opiniones como admin
     */
    public function getEliminarAdmin($id)
    {
        if (Sesion::esAdministrador()) {
            $opinion = new Opinion();
            $opinion = $opinion->listarPorId($id);
            if (isset($opinion) && $opinion->obtenerId() === (int)$id) {
                $opinion->eliminar();
            }
        } else {
            header("Location: /");
        }
        header("Location: /opiniones/todas");
    }

    /**
     * Listar opiniones
     */
    public function getListar()
    {
        $usuario = Sesion::obtenerUsuario();
        $opinion = new Opinion();
        $opiniones = $opinion->listarPorUsuario($usuario->obtenerId());
        $this->renderizar("Listar.php", ["usuario" => $usuario, "opiniones" => $opiniones]);
    }

    /**
     * Listar todas las opiniones
     * para admin
     */
    public function getOpiniones()
    {
        $opinion = new Opinion();
        $opiniones = $opinion->listarOpiniones();
        $this->renderizar("ListarTodas.php", ["opiniones" => $opiniones]);
    }

    /**
     * Crear opiniones
     */
    public function postCrear()
    {
        $usuario = Sesion::obtenerUsuario();
        $anuncio = new Anuncio();
        $anuncio = $anuncio->listarPorId($_POST["anuncio-id"]);
        $opinion = new Opinion();
        $opinion->definirMensaje($_POST["mensaje"]);
        $opinion->crearUsuario($usuario);
        $opinion->crearAnuncio($anuncio);
        if ($opinion->insertar()) {
            header(sprintf("Location: /ver-anuncios/%d", $anuncio->obtenerId()));
        } else {
            header("Location: /opiniones/crear");
        }
    }

    /**
     * Editar opiniones
     */
    public function postEditar($id)
    {
        $usuario = Sesion::obtenerUsuario();
        $anuncio = new Anuncio();
        $anuncio = $anuncio->listarPorId($_POST["anuncio"]);
        $opinion = new Opinion();
        $opinion = $opinion->listarPorId($id);
        $opinion->definirMensaje($_POST["mensaje"]);
        $opinion->definirAnuncio($anuncio->obtenerId());
        $opinion->definirUsuario($usuario->obtenerId());
        if ($opinion->actualizar()) {
            header("Location: /opiniones");
        } else {
            header("Location: /opiniones/editar/$id");
        }
    }
}
