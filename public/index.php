<?php

require_once(dirname(__DIR__) . "/src/Modelos/Rol.php");
require_once(dirname(__DIR__) . "/src/Modelos/Usuario.php");
require_once(dirname(__DIR__) . "/src/Sesion.php");
Sesion::instanciar();
/**
 * redireccionar las peticiones hacia los controladores
 * según las URI's introducidas en la barra de navegación
 */
switch (1) {
    /**
     * Página Inicio
     */
    case preg_match("`^/$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Inicio.php";
        $clase = "Inicio";
        $accion = "getInicio";
        break;
    /**
     * Perfil
     */
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

    /**
     * Usuarios
     */
    case preg_match("`^/usuarios$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Usuarios.php";
        $clase = "Usuarios";
        $accion = "getListar";
        break;
    case preg_match("`^/usuarios/editar/(?<id>\d+)$`", $_SERVER["REQUEST_URI"], $matches):
        $fichero = dirname(__DIR__) . "/src/Controladores/Usuarios.php";
        $clase = "Usuarios";
        $argumento = $matches["id"];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postEditar";
        } else {
            $accion = "getEditar";
        }
        break;
    /**
     * Identificación
     */
    case preg_match("`^/identificacion$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Acceso.php";
        $clase = "Acceso";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postIdentificar";
        } else {
            $accion = "getIdentificar";
        }
        break;
    /**
     * Registro
     */
    case preg_match("`^/registro$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Acceso.php";
        $clase = "Acceso";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postRegistro";
        } else {
            $accion = "getRegistro";
        }
        break;
    /**
     * Roles crear
     */
    case preg_match("`^/roles/crear$`", $_SERVER["REQUEST_URI"]):
       if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
        } else {
            $accion = "getCrear";
       }
        $fichero = dirname(__DIR__) . "/src/Controladores/Roles.php";
        $clase = "Roles";
        break;
    /**
     * Roles ver
     */
    case preg_match("`^/roles$`", $_SERVER["REQUEST_URI"]):
         if (!(Sesion::esAdministrador())) {
                header("Location: /");
            } else {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
                } else {
                $accion = "getCrear";
            }
        $fichero = dirname(__DIR__) . "/src/Controladores/Roles.php";
        $clase = "Roles";
        $accion = "getListar";
    }
        break;
    /**
     * Roles editar
     */
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
    /**
     * Opiniones Ver
     */
    case preg_match("`^/opiniones$`", $_SERVER["REQUEST_URI"]):
        $fichero = dirname(__DIR__) . "/src/Controladores/Opiniones.php";
        $clase = "Opiniones";
        $accion = "getInicio";
        break;
    /**
     * Crear tipo de animales
     */
    case preg_match("`^/animales/tipos/crear$`", $_SERVER["REQUEST_URI"]):
    if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
        } else {
            $accion = "getCrear";
        }
    }
        break;
    /**
     * Editar tipos de animales
     */
    case preg_match("`^/animales/tipos/editar/(?<id>\d+)$`", $_SERVER["REQUEST_URI"], $matches):
        if(Sesion::esInvitado()){
            header("Location: /identificacion", 301);
        } else {
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        $argumento = $matches["id"];
             if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postEditar";
                } else {
            $accion = "getEditar";
                }
        }
        break;
    /**
     * Ver tipos de animales
     */
    case preg_match("`^/animales/tipos$`", $_SERVER["REQUEST_URI"]):
        if(Sesion::esInvitado()){
            header("Location: /identificacion", 301);
        } else {
        $fichero = dirname(__DIR__) . "/src/Controladores/Animales/Tipos.php";
        $clase = "AnimalesTipos";
        $accion = "getListar";
        }
        break;
    /**
     * Ver animales
     */
    case preg_match("`^/animales$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Animales.php";
            $clase = "Animales";
            $accion = "getListar";
        }
        break;
    /**
     * Crear animales
     */
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
    /**
     * Editar animales
     */
    case preg_match("`^/animales/editar/(?<id>\d+)$`", $_SERVER["REQUEST_URI"], $matches):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Animales.php";
            $clase = "Animales";
            $argumento = $matches["id"];
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $accion = "postEditar";
            } else {
                $accion = "getEditar";
            }
        }
        break;
    /**
     * Crear servicios
     */
    case preg_match("`^/servicios/crear$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Servicios.php";
            $clase = "Servicios";
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postCrear";
            } else {
            $accion = "getCrear";
            }
        }
        break;
    /**
     * Ver servicios
     */
    case preg_match("`^/servicios$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
        $fichero = dirname(__DIR__) . "/src/Controladores/Servicios.php";
        $clase = "Servicios";
        $accion = "getListar";
    }
        break;
    /**
     * Editar servicios
     */
    case preg_match("`^/servicios/editar/(?<id>\d+)$`", $_SERVER["REQUEST_URI"], $matches):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Servicios.php";
            $clase = "Servicios";
            $argumento = $matches["id"];
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postEditar";
                } else {
                $accion = "getEditar";
        }
    }
        break;
    /**
     * Ficheros ????
     */
    case preg_match("`^/fichero$`", $_SERVER["REQUEST_URI"]):
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $accion = "postInicio";
        } else {
            $accion = "getInicio";
        }
        $fichero = dirname(__DIR__) . "/src/Controladores/Fichero.php";
        $clase = "Fichero";
        break;
    /**
     * Ver direcciones
     */
    case preg_match("`/direcciones$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Direcciones.php";
            $clase = "Direcciones";
            $accion = "getListar";
        }
        break;
    /**
     * Crear direcciones
     */
    case preg_match("`/direcciones/crear$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Direcciones.php";
            $clase = "Direcciones";
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $accion = "postCrear";
            } else {
                $accion = "getCrear";
            }
        }
        break;
    /**
     * Editar direcciones
     */
    case preg_match("`/direcciones/editar/(?<id>\d+)$`", $_SERVER["REQUEST_URI"], $matches ):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Direcciones.php";
            $clase = "Direcciones";
            $argumento = $matches["id"];
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $accion = "postEditar";
            } else {
                $accion = "getEditar";
            }
        }
        break;
    /**
     * Ver anuncios
     */
    case preg_match("`/anuncios$`", $_SERVER["REQUEST_URI"]):
    break;
    /**
     * Crear anuncios
     */
    case preg_match("`/anuncios/crear$`", $_SERVER["REQUEST_URI"]):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Anuncios.php";
            $clase = "Anuncios";
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $accion = "postCrear";
            } else {
                $accion = "getCrear";
            }
        }
    break;
    /**
     * Editar anuncios
     */
    case preg_match("`/anuncios/editar(?<id>\d+)$`", $_SERVER["REQUEST_URI"], $matches):
        if (Sesion::esInvitado()) {
            header("Location: /identificacion", 301);
        } else {
            $fichero = dirname(__DIR__) . "/src/Controladores/Anuncios.php";
            $clase = "Anuncios";
            $argumento = $matches["id"];
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $accion = "postEditar";
            } else {
                $accion = "getEditar";
            }
        }
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
