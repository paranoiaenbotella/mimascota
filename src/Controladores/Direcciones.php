<?php

require_once(dirname(__DIR__) . "/Modelos/Direccion.php");
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
     * Mediante este método se muestra por pantalla el
     * formulario para editar la dirección
     */
    public function getEditar($id)
    {
        $direccion = new Direccion();
        $direccion = $direccion->listarPorId($id);
        $usuario = new Usuario;
        $usuario->listarPorId(Sesion::obtenerUsuario()->obtenerId());
        $this->renderizar("Editar.php", ["direccion" => $direccion, "usuario"=>$usuario]);
    }

    public function getEliminar($id)
    {
        if (Sesion::esCuidador()) {
            $direccion = new Direccion();
            $direccion = $direccion->listarDirecciones(Sesion::obtenerUsuario()->obtenerId());
            if (isset($direccion) && $direccion->obtenerId() === (int)$id) {
                $direccion->eliminar();
            }
        } else {
            header("Location: /");
        }
        header("Location: /perfil");
    }

    /**
     * Mediante este método se muestran las direcciones
     */
    public function getListar()
    {
        $direccion = new Direccion();
        $direccion = $direccion->listarDirecciones(Sesion::obtenerUsuario()->obtenerId());
        $usuario = new Usuario();
        $usuario = $usuario->listarUsuarios();
        $this->renderizar("Listar.php", ["direccion" => $direccion, "usuario" => $usuario]);
    }

    /**
     * Mediante este método se controla la inserción
     * de las direcciones en la bd
     */
    public function postCrear()
    {
        $usuario = new Usuario();
        $usuario = Sesion::obtenerUsuario();
        $direccion = new Direccion();
        $direccion->definirPais($_POST["pais"]);
        $direccion->definirCiudad($_POST["ciudad"]);
        $direccion->definirCodigoPostal($_POST["codigoPostal"]);
        $direccion->definirCalle($_POST["calle"]);
        $direccion->crearUsuario($usuario);
        if ($direccion->insertar()) {
            Sesion::definirAcierto("Operación realizada.", "succes");
            header("Location: /direcciones");
        } else {
            Sesion::definirError("No se ha podido crear la direccion.", "direccion");
            header("Location: /direcciones/crear");
        }
    }

    /**
     * Método para editar una dirección
     */
    public function postEditar($id)
    {
        $usuario = Sesion::obtenerUsuario();
        $direccion = new Direccion();
        $direccion = $direccion->listarPorId($id);
        $direccion->definirPais($_POST["pais"]);
        $direccion->definirCiudad($_POST["ciudad"]);
        $direccion->definirCodigoPostal($_POST["codigoPostal"]);
        $direccion->definirCalle($_POST["calle"]);
        $direccion->definirUsuario($usuario->obtenerId());
        if ($direccion->actualizar()) {
            header("Location: /direcciones");

        } else {
            header("Location: /direcciones/editar/$id");

        }

    }
}
