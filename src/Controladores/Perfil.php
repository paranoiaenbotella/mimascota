<?php

require_once(dirname(__DIR__) . "/Modelos/Direccion.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");
require_once(dirname(__DIR__) . "/Controlador.php");
require_once(dirname(__DIR__) . "/Modelos/Servicio.php");

/**
 * Mediante esta clase se controla las operaciones relacionadas con la creacion
 * y edicion del perfil del usuario facilitandose para ello la interfaz correspondiente
 */
class Perfil extends Controlador
{
    /**
     * Método que devuelve la vista
     */
    protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Perfil";
    }

    public function getInicio()
    {
        $usuario = Sesion::obtenerUsuario();
        if (Sesion::esCuidador()) {
            $direccion = new Direccion();
            $direccion = $direccion->listarDirecciones($usuario->obtenerId());
            $servicio = new Servicio();
            $servicios = $servicio->listarPorUsuario($usuario->obtenerId());
            $this->renderizar("Cuidador.php", ["direccion" => $direccion, "usuario" => $usuario, "servicios"=>$servicios]);
        } else {
            $this->renderizar("Propietario.php", ["usuario" => $usuario]);
        }
    }

    public function postInicio()
    {
        $usuario = Sesion::obtenerUsuario();
        $usuario->definirNombre($_POST["nombre"]);
        $usuario->definirApellidos($_POST["apellidos"]);
        $usuario->definirMovil($_POST["movil"]);
        $usuario->definirEmail($_POST["email"]);
        if (isset($_FILES["imagen"])) {
            $usuario->definirImagen($_FILES["imagen"]);
        }
        if ($usuario->actualizar()) {
            header("Location: /perfil");
        } else {
            var_dump("Algo ha follado");
        }
        header("Location: /perfil");
    }
}
