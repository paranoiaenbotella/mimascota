<?php

require_once(dirname(__DIR__) . "/src/Sesion.php");
Sesion::instanciar();
/**
 * redireccionar las peticiones hacia los controladores
 * según las URI's introducidas en la barra de navegación
 */
switch ($_SERVER["REQUEST_URI"]) {
    case '/':
        $fichero = dirname(__DIR__) . "/src/Controladores/Inicio.php";
        $clase = "Inicio";
        $accion = "getInicio";
        break;
    case "/perfil":
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Perfil.php";
            $clase = "Perfil";
            $accion = "getInicio";
        }
        break;
    case "/editar":
        $fichero = dirname(__DIR__) . "/src/Controladores/Perfil.php";
        $clase = "Perfil";
        $accion = "getEditar";
        break;
    case "/identificacion":
        $fichero = dirname(__DIR__) . "/src/Controladores/Acceso.php";
        $clase = "Acceso";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postIdentificar";
        } else {
            $accion = "getIdentificar";
        }
        break;
    case "/registro":
        $fichero = dirname(__DIR__) . "/src/Controladores/Acceso.php";
        $clase = "Acceso";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postRegistro";
        } else {
            $accion = "getRegistro";
        }
        break;
    case "/roles/crear";
        $fichero = dirname(__DIR__) . "/src/Controladores/Roles.php";
        $clase = "Roles";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
        } else {
            $accion = "getCrear";
        }
        break;
    case "/roles":
        $fichero = dirname(__DIR__) . "/src/Controladores/Roles.php";
        $clase = "Roles";
        $accion = "getListar";
        break;
    case "/opiniones":
        $fichero = dirname(__DIR__) . "/src/Controladores/Opiniones.php";
        $clase = "Opiniones";
        $accion = "getInicio";
        break;
    case "/animales/tipos/crear":
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
        } else {
            $accion = "getCrear";
        }
        break;
    case "/animales/tipos":
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        $accion = "getListar";
        break;
    case "/tarifas/tipos/crear":
        $fichero = dirname(__DIR__) . "/src/Controladores/Tarifas/Tipos.php";
        $clase = "TarifasTipo";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
        } else {
            $accion = "getCrear";
        }
        break;
    case "/tarifas/tipos":
        $fichero = dirname(__DIR__) . "/src/Controladores/Tarifas/Tipos.php";
        $clase = "TarifasTipo";
        $accion = "getListar";
        break;
    case "/fichero":
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postInicio";
        } else {
            $accion = "getInicio";
        }
        $fichero = dirname(__DIR__) . "/src/Controladores/Fichero.php";
        $clase = "Fichero";
        break;
    default:
        echo("Error 404 - Página no encontrada");
        break;
}
//Instanciar clases
require_once($fichero);
$instancia = new $clase();
$instancia->$accion();
