<?php

/**
 * redireccionar las peticiones hacia los controladores
 *identificando los recursos pedidos por los usuarios
 */
switch ($_SERVER["REQUEST_URI"]) {
    case '/':
        $fichero = dirname(__DIR__) . "/src/Controladores/Inicio.php";
        $clase = "Inicio";
        $accion = "getInicio";
        break;
    case "/perfil":
        $fichero = dirname(__DIR__) . "/src/Controladores/Perfil.php";
        $clase = "Perfil";
        $accion = "inicio";
        break;
    case "/editar":
        $fichero = dirname(__DIR__) . "/src/Controladores/Perfil.php";
        $clase = "Perfil";
        $accion = "editarPerfil";
        break;
    case "/identificacion":
        $fichero = dirname(__DIR__) . "/src/Controladores/Acceso.php";
        $clase = "Acceso";
        $accion = "identificar";
        break;
    case "/registro":
        $fichero = dirname(__DIR__) . "/src/Controladores/Acceso.php";
        $clase = "Acceso";
        $accion = "registrar";
        break;
    case "/opiniones":
        $fichero = dirname(__DIR__) . "/src/Controladores/Opiniones.php";
        $clase = "Opiniones";
        $accion = "inicio";
        break;
    case "/animales/tipos/crear":
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "crearTipoPost";
        } else {
            $accion = "crearTipoGet";
        }
        break;
    case "/tarifas/tipos/crear":
        $fichero = dirname(__DIR__) . "/src/Controladores/Tarifas/Tipos.php";
        $clase = "TarifasTipo";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "crearTipoPost";
        } else {
            $accion = "crearTipoGet";
        }
        break;
    default:
        echo("Error 404 - Página no encontrada");
        break;
}
//Instanciar clases
require_once($fichero);
$instancia = new $clase();
$instancia->$accion();
