<?php

require_once(dirname(__DIR__)."/Modelo.php");

/**
 * Operaciones contra la tabla anuncios
 */

class Anuncio extends Modelo
{
	private $id;

	private $usuario;

	private $tarifa;

	private $fecha;

	private $imagen1;

    private $imagen2;

    private $imagen3;

    private $imagen4;


     /**
     * Se define y se fuerza que el tipo
     * de la $id sea Int
     */
    private function definirId($id)
    {
        $this->id = (int)$id;
    }

/**
 * Método para obtener el id
 */
    public function obtenerId()
    {
        if (is_null($this->id)) {
            throw new Exception("El identificador del anuncio no está definido.");
        } else {
            return $this->id;
        }
    }

    /**
     * Se crea al usuario propietario del anuncio
     */
public function crearUsuario($usuario){

    if ($usuario instanceof Usuario){
        $this->usuario = $usuario->obtenerId();
    } else {
        throw new Exception("El parámetro facilitado no es una instancia de la clase Usuario.");

    }
}

    /**
     * Se define y se fuerza que el tipo
     * de la $usuario sea Int
     */
    public function definirUsuario($usuario){
        $this->usuario = (int)$usuario;
    }

/**
 * Método para obtener el usuario
 */
    public function obtenerUsuario()
    {
        if (is_null($this->usuario)) {
            throw new Exception("El usuario no está definido");
        } else {
            return $this->usuario;
        }
    }





/**
 * Método para definir la fecha de creación
 */

public function definirFecha($fecha)
{
    if (is_null($fecha)) {
        Sesion::definirError("No hay una fecha creada.", "fecha");
    } else {
        $this->fecha = date_format(strtotime($fecha), "d/m/y");
    }
    return $this;
}

/**
 * Método para obtener la fecha de creación
 */
public function obtenerFecha()
{
	if(is_null($this->fecha)) {
        throw new Exception("La fecha no está definida");
    } else {



		return $this->fecha;
	}
}

/**
 * Método para definir la imagen 1
 */
    public function definirImagen1($imagen1)
    {
        if (is_array($imagen1)) {
            $imagen1Nombre = sha1($imagen1["tmp_name"]);
            $imagen1Direccion = sprintf("%s/%s", self::DIRECTORY_IMG, $imagen1Nombre);
            if (move_uploaded_file($imagen1["tmp_name"], $imagen1Direccion)) {
                $this->imagen1 = sprintf("/img/%s", $imagen1Nombre);
            } else {
                Sesion::definirError("La imagen no es valida, prueba .jpg o .png .", "imagen");
            }
        } else {
            $this->imagen1 = $imagen1;
        }
    }

/**
 * Método para definir la imagen 2
 */
    public function definirImagen2($imagen2)
    {
        if (is_array($imagen2)) {
            $imagen2Nombre = sha1($imagen2["tmp_name"]);
            $imagen2Direccion = sprintf("%s/%s", self::DIRECTORY_IMG, $imagen2Nombre);
            if (move_uploaded_file($imagen2["tmp_name"], $imagen2Direccion)) {
                $this->imagen2 = sprintf("/img/%s", $imagen2Nombre);
            } else {
                Sesion::definirError("La imagen no es valida, prueba .jpg o .png .", "imagen");
            }
        } else {
            $this->imagen2 = $imagen2;
        }
    }

/**
 * Método para definir la imagen 3
 */
    public function definirImagen3($imagen3)
    {
        if (is_array($imagen3)) {
            $imagen3Nombre = sha1($imagen3["tmp_name"]);
            $imagen3Direccion = sprintf("%s/%s", self::DIRECTORY_IMG, $imagen3Nombre);
            if (move_uploaded_file($imagen3["tmp_name"], $imagen3Direccion)) {
                $this->imagen3 = sprintf("/img/%s", $imagen3Nombre);
            } else {
                Sesion::definirError("La imagen no es valida, prueba .jpg o .png .", "imagen");
            }
        } else {
            $this->imagen3 = $imagen3;
        }
    }

/**
 * Método para definir la imagen 4
 */
    public function definirImagen4($imagen4)
    {
        if (is_array($imagen4)) {
            $imagen4Nombre = sha1($imagen4["tmp_name"]);
            $imagen4Direccion = sprintf("%s/%s", self::DIRECTORY_IMG, $imagen4Nombre);
            if (move_uploaded_file($imagen4["tmp_name"], $imagen4Direccion)) {
                $this->imagen4 = sprintf("/img/%s", $imagen4Nombre);
            } else {
                Sesion::definirError("La imagen no es valida, prueba .jpg o .png .", "imagen");
            }
        } else {
            $this->imagen4 = $imagen4;
        }
    }

 /**
 * Método para obtener la imagen 1
 */
    public function obtenerImagen1()
    {
        if (is_null($this->imagen1)){
        throw new Exception("Ruta de la imagen no definida");
        }   else {
            return $this->imagen1;
        }
    }

/**
 * Método para obtener la imagen 2
 */
    public function obtenerImagen2()
    {
        if (is_null($this->imagen2)){
        throw new Exception("Ruta de la imagen no definida");
        }   else {
            return $this->imagen2;
        }
    }

/**
 * Método para obtener la imagen 3
 */
    public function obtenerImagen3()
    {
        if (is_null($this->imagen3)){
        throw new Exception("Ruta de la imagen no definida");
        }   else {
            return $this->imagen3;
        }
    }

/**
 * Método para obtener la imagen 4
 */
    public function obtenerImagen4()
    {
        if (is_null($this->imagen4)) {
            throw new Exception("Ruta de la imagen no definida");
        } else {
            return $this->imagen4;
        }
    }


}
