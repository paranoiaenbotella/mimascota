<?php  

require_once(dirname(__DIR__) . "/Modelos/Opinion.php");
require_once(dirname(__DIR__) . "/Modelos/Usuario.php");
require_once(dirname(__DIR__) . "/Modelos/Anuncio.php");
require_once(dirname(__DIR__) . "/Controlador.php");


/**
 * Mediante esta clase se controla las operaciones sobre la tabla 'opiniones' 
 * y muestra por pantalla los resultados utilizando las vista correspondiente
 * para cada operación
 */
class Opiniones extends Controlador

{

/**
 * Método que devuelve la vista
 */
	protected function obtenerDirectorioVistas()
    {
        return dirname(__DIR__) . "/Vistas/Opiniones";
    }

/**
 * Listar opiniones
 */
	public function getListar(){
		$this->renderizar("Listar.php");
	}

/**
 * Mostrar formulario para
 * crear opiniones
 */
	public function getCrear()
    {
        $opinion = new Opinion();
        $opinion = $opinion->listarPorUsuario(Sesion::obtenerUsuario()->obtenerId());
        $this->renderizar("Crear.php", ["opinion" => $opinion]);
    }

/**
 * Mostrar formulario para
 * editar opiniones
 */
public function getEditar($id)
    {
        $usuario = Sesion::obtenerUsuario()->obtenerId();
        $anuncio = new Anuncio();
        $anuncio = $anuncio->listarPorId($id);

        $this->renderizar("Editar.php", ["anuncio" => $anuncio, "usuario"=>$usuario]);
    }

/**
 * Crear opiniones
 */
	public function postCrear()
    {	
    		$anuncio = new Anuncio();
    		$anuncios = $anuncio->listarPorUsuario(Sesion::obtenerUsuario());
        $opinion = new Opinion();
        $opinion->definirNombre($_POST["mensaje"]);
        $opinion->crearUsuario(Sesion::obtenerUsuario());
        
        if ($opinion->insertar()) {
            header("Location: /opiniones");
        } else {
            header("Location: /opiniones/crear");
        }
    }

/**
 * Editar opiniones
 */
	public function postEditar($id)
    {
        $usuario = Sesion::obtenerUsuario();
        $servicio = new Servicio();
        $servicio = $servicio->listarPorId($id);
        $servicio->definirNombre($_POST["nombre"]);
        $servicio->definirDescripcion($_POST["descripcion"]);
        $servicio->definirPrecio($_POST["precio"]);
        $servicio->definirUsuario($usuario->obtenerId());
        if ($servicio->actualizar()) {
            header("Location: /servicios");
        } else {
            header("Location: /servicios/editar/$id");
        }
    }
/**
 * Eliminar opiniones
 */
 public function getEliminar($id)
    {
       if (Sesion::esCuidador()) {
            $servicio = new Servicio();
            $servicio = $servicio->listarPorId($id);
            if (isset($servicio) && $servicio->obtenerId() === (int)$id) {
                $servicio->eliminar();
                }
        } else {header("Location: /");}
        header("Location: /servicios");
    }

}