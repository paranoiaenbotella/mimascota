<?php  

require_once(dirname(__DIR__) . "/Modelos/Animal.php");

class Perfil {
	public function inicio(){
		require_once(dirname(__DIR__)."/Vistas/Perfil/Inicio.php");
	}

	public function editarPerfil(){

		$animal = new Animal();
		$animal1 = $animal->insertarAnimal("Buddy");
		require_once(dirname(__DIR__)."/Vistas/Perfil/Editar.php");



	}
}