<?php  

require_once(dirname(__DIR__) . "/Modelos/Usuario.php");
require_once(dirname(__DIR__) . "/Modelos/Direccion.php");

class Acceso {
	public function identificar(){
		require_once(dirname(__DIR__)."/Vistas/Acceso/Identificacion.php");
	}

	public function registrar(){

		$usuario = new Usuario();
		$usuario1 = $usuario->insertarCuidador("Lola", "Nola", "loquesea@vaya.com", "1234", "", 1);

		$direccion = new Direccion();
		$direccion1 = $direccion->insertarDireccion("Universo", "Luna", "z456q", "Sensación", "", "", "", "", );


		require_once(dirname(__DIR__)."/Vistas/Acceso/Registro.php");

		
	}
}