<?php

require_once(dirname(__DIR__) . "/src/Sesion.php");
Sesion::instanciar();
/**
 * redireccionar las peticiones hacia los controladores
 * según las URI's introducidas en la barra de navegación
 */
switch (1) {
    case preg_match("`^/$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Inicio.php";
        $clase = "Inicio";
        $accion = "getInicio";
        break;
    case preg_match("`^/perfil$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $accion = "postInicio";
            } else {
                $accion = "getInicio";
            }
            $fichero = dirname(__DIR__) . "/src/Controladores/Perfil.php";
            $clase = "Perfil";
        }
        break;
    case preg_match("`^/identificacion$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Acceso.php";
        $clase = "Acceso";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postIdentificar";
        } else {
            $accion = "getIdentificar";
        }
        break;
    case preg_match("`^/registro$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Acceso.php";
        $clase = "Acceso";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postRegistro";
        } else {
            $accion = "getRegistro";
        }
        break;
    case preg_match("`^/roles/crear$`", $_SERVER["REQUEST_URI"]);
        $fichero = dirname(__DIR__) . "/src/Controladores/Roles.php";
        $clase = "Roles";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
        } else {
            $accion = "getCrear";
        }
        break;
    case preg_match("`^/roles$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Roles.php";
        $clase = "Roles";
        $accion = "getListar";
        break;
    case preg_match("`^/roles/editar/(?<id>\d+)$`", $_SERVER["REQUEST_URI"], $matches):
        $fichero = dirname(__DIR__) . "/src/Controladores/Roles.php";
        $clase = "Roles";
        $argumento = $matches["id"];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postEditar";
        } else {
            $accion = "getEditar";
        }
        break;
    case preg_match("`^/opiniones$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Opiniones.php";
        $clase = "Opiniones";
        $accion = "getInicio";
        break;
    case preg_match("`^/animales/tipos/crear$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
        } else {
            $accion = "getCrear";
        }
        break;
    case preg_match("`^/animales/tipos/editar$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postEditar";
        } else {
            $accion = "getEditar";
        }
        break;
    case preg_match("`^/animales/tipos$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        $accion = "getListar";
        break;
    case preg_match("`^/animales$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Animales.php";
            $clase = "Animales";
            $accion = "getListar";
        }
        break;
    case preg_match("`^/animales/crear$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Animales.php";
            $clase = "Animales";
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $accion = "postCrear";
            } else {
                $accion = "getCrear";
            }
        }
        break;
    case preg_match("`^/animales/editar$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Animales.php";
            $clase = "Animales";
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $accion = "postEditar";
            } else {
                $accion = "getEditar";
            }
        }
        break;
    case preg_match("`^/tarifas/crear$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Tarifas.php";
        $clase = "Tarifas";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
        } else {
            $accion = "getCrear";
        }
        break;
    case preg_match("`^/tarifas$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Tarifas.php";
        $clase = "Tarifas";
        $accion = "getListar";
        break;
    case preg_match("`^/tarifas/editar$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Tarifas.php";
        $clase = "Tarifas";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postEditar";
        } else {
            $accion = "getEditar";
        }
        break;
    case preg_match("`^/fichero$`", $_SERVER["REQUEST_URI"]):
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
if (isset($argumento)) {
    $instancia->$accion($argumento);
} else {
    $instancia->$accion();
}
