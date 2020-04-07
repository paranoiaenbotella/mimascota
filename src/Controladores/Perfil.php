<?php  



class Perfil {
	public function inicio(){
		require_once(dirname(__DIR__)."/Vistas/Perfil/Inicio.php");
	}

	public function editarPerfil(){

		require_once(dirname(__DIR__)."/Vistas/Perfil/Editar.php");



	}
}