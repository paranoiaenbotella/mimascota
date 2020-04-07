<?php  



class Acceso {
	public function identificar(){
		require_once(dirname(__DIR__)."/Vistas/Acceso/Identificacion.php");
	}

	public function registrar(){


		require_once(dirname(__DIR__)."/Vistas/Acceso/Registro.php");

		
	}
}