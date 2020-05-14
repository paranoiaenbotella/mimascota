<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD y los métodos
 * que definen, obtienen y validan los datos.
 */
class Direccion extends Modelo
{
    private $id;

    private $usuario;

    private $pais;

    private $ciudad;

    private $codigoPostal;

    private $calle;

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
            throw new Exception("El identificador de la dirección no está definido.");
        } else {
            return $this->id;
        }
    }

    /**
     * Se crea al usuario propietario del animal
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
 * Método para definir el país
 */
    public function definirPais($pais)
    {
        $paisValido = filter_var($pais, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($paisValido === false) {
            throw new Exception("El país introducido no es valido");

        }   else {
            $this->pais = $paisValido;
        }
    }

/**
 * Método para definir la ciudad
 */
    public function definirCiudad($ciudad)
    {
        $ciudadValida = filter_var($ciudad, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($ciudadValida === false) {
            throw new Exception("La ciudad introducida no es valida");
        } else {
            $this->ciudad = $ciudadValida;
        }
    }

/**
 * Método para definir el código postal
 */
    public function definirCodigoPostal($codigoPostal)
    {
        $codigoPostalValido = filter_var($codigoPostal, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($codigoPostalValido === false) {
            throw new Exception("El codigo postal introducido no es valido");
        }   else {
            $this->codigoPostal = $codigoPostalValido;
        }
    }

/**
 * Método para definir la calle
 */
    public function definirCalle($calle)
    {
        $calleValida = filter_var($calle, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($calleValida === false) {
            throw new Exception("La calle introducida no es valida");
        } else {
            $this->calle = $calleValida;
        }
    }



/**
 * Método para obtener el país
 */
    public function obtenerPais()
    {
        if (is_null($this->pais)){
        throw new Exception("El país no esta definido");
        }   else {
            return $this->pais;
        }
    }

/**
 * Método para obtener la ciudad
 */
    public function obtenerCiudad()
    {
        if (is_null($this->ciudad)){
        throw new Exception("La ciudad no esta definida");
        }   else {
            return $this->ciudad;
        }
    }

/**
 * Método para obtener el código postal
 */
    public function obtenerCodigoPostal()
    {
        if (is_null($this->codigoPostal)){
        throw new Exception("El codigo postal no esta definido");
        }   else {
            return $this->codigoPostal;
        }
    }

/**
 * Método para obtener la calle
 */
    public function obtenerCalle()
    {
        if (is_null($this->calle)){
        throw new Exception("La calle no esta definida");
        }   else {
            return $this->calle;
        }
    }



/**
 * Método para insertar dirección
 */
    public function insertar() {
        $consulta = $this->conexion->prepare(
            "INSERT INTO 'direcciones' (`id_usuarios`, `pais`, `ciudad`, `codigo_postal`, `calle`, `imagen1`, `imagen2`, `imagen3`, `imagen4`) VALUE ( ?,?,?,?,?,?,?,?,?)");
        $consulta->bind_param("issssssss", $this->usuario, $this->pais, $this->ciudad, $this->codigoPostal,
            $this->calle, $this->imagen1, $this->imagen2, $this->imagen3, $this->iamgen4);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    /**
     * Método para leer direcciones por el id de usuario
     */
    public function listarPorIdUsuario($usuario)
    {
        $direcciones = [];
        $consulta = $this->conexion->prepare("SELECT * FROM `direcciones` WHERE `id_usuarios` = ?");
        $consulta->bind_param("i", $usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        while ($fila = $resultado->fetch_assoc()) {
            $direccion = new Direccion();
            $direccion->definirId($fila["id"]);
            $direccion->definirPais($fila["pais"]);
            $direccion->definirCiudad($fila["ciudad"]);
            $direccion->definirCodigoPostal($fila["codigo_postal"]);
            $direccion->definirCalle($fila["calle"]);
            $direccion->definirImagen1($fila["imagen1"]);
            $direccion->definirImagen2($fila["imagen2"]);
            $direccion->definirImagen3($fila["imagen3"]);
            $direccion->definirImagen4($fila["imagen4"]);
            array_push($direcciones, $direccion);
        }

        return $direccioens;
    }

    /**
     * Método para actualizar direcciones por el id 
     */
    public function actualizar(){

        $consulta = $this->conexion->prepare("UPDATE direcciones SET id_usuarios = ?, pais =?, ciudad = ?, codigo_postal = ?, calle = ?, imagen1 = ?, imagen2 = ?, imagen3 =?, imagen4 = ? WHERE id = ?");
        $consulta->bind_param("issssssssi", $this->usuario, $this->pais, $this->ciudad, $this->codigoPostal, $this->calle, $this->imagen1, $this->imagen2, $this->imagen3, $this->imagen4, $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
    /**
     * Método para eliminar direcciones por el id 
     */
    public function eliminar(){

       $consulta = $this->conexion->prepare("DELETE FROM `direcciones` WHERE `id` = ?");
        $consulta->bind_param("i", $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado; 
    }

}
