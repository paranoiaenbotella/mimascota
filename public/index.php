<?php  


switch ($_SERVER["REQUEST_URI"]) {
	case '/':
		$fichero = dirname(__DIR__)."/src/Controladores/Inicio.php";
		$clase = "Inicio";
		$accion = "inicio";
		break;
	case "/perfil":
		$fichero = dirname(__DIR__)."/src/Controladores/Perfil.php";
		$clase = "Perfil";
		$accion = "inicio";
		break;
	case "/acceso":
		$fichero = dirname(__DIR__)."/src/Controladores/Acceso.php";
		$clase = "Acceso";
		$accion = "inicio";
		break;
	case "/opiniones":
		$fichero = dirname(__DIR__)."/src/Controladores/Opiniones.php";
		$clase = "Opiniones";
		$accion = "inicio";
		break;
	
	default:
		echo ("Error 404 - Página no encontrada");
		break;
}

//Instanciar clases
require_once($fichero);
$instancia = new $clase();
$instancia-> $accion();