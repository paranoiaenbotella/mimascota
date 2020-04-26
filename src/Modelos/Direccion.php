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
 * Método para definir la imagen 1
 */
    public function definirImagen1($imagen1)
    {
        $imagen1Valida = filter_var($imagen1, FILTER_SANITIZE_URL);
        if ($imagen1Valida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->imagen1 = $imagen1Valida;
        }
    }

/**
 * Método para definir la imagen 2
 */
    public function definirImagen2($imagen2)
    {
        $imagen2Valida = filter_var($imagen2, FILTER_SANITIZE_URL);
        if ($imagen2Valida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->iamgen2 = $imagen2Valida;
        }
    }

/**
 * Método para definir la imagen 3
 */
    public function definirImagen3($imagen3)
    {
        $imagen3Valida = filter_var($imagen3, FILTER_SANITIZE_URL);
        if ($imagen3Valida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->imagen3 = $imagen3Valida;
        }
    }

/**
 * Método para definir la imagen 4
 */
    public function definirImagen4($imagen4)
    {
        $imagen4Valida = filter_var($imagen4, FILTER_SANITIZE_URL);
        if ($imagen4Valida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->iamgen4 = $imagen4Valida;
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
}
