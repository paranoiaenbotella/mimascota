<?php  



class Perfil {
	public function getInicio(){
		require_once(dirname(__DIR__)."/Vistas/Perfil/Inicio.php");
	}

	public function getEditar(){

		require_once(dirname(__DIR__)."/Vistas/Perfil/Editar.php");

	}


}