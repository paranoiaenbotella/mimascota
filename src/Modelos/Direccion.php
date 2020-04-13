<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD y los métodos
 * que definen, obtienen y validan los datos.
 */
class Direccion extends Modelo
{
    private $pais;

    private $ciudad;

    private $codigoPostal;

    private $calle;

    private $imagen1;

    private $imagen2;

    private $imagen3;

    private $imagen4;

    /**
     * Métodos para definir y obtener datos
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

    public function definirCiudad($ciudad)
    {
        $ciudadValida = filter_var($ciudad, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($ciudadValida === false) {
            throw new Exception("La ciudad introducida no es valida");
        } else {
            $this->ciudad = $ciudadValida;
        }
    }

    public function definirCodigoPostal($codigoPostal)
    {
        $codigoPostalValido = filter_var($codigoPostal, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($codigoPostalValido === false) {
            throw new Exception("El codigo postal introducido no es valido");
        }   else {
            $this->codigoPostal = $codigoPostalValido;
        }
    }

    public function definirCalle($calle)
    {
        $calleValida = filter_var($calle, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($calleValida === false) {
            throw new Exception("La calle introducida no es valida");
        } else {
            $this->calle = $calleValida;
        }
    }
    public function definirImagen1($imagen1)
    {
        $imagen1Valida = filter_var($imagen1, FILTER_SANITIZE_URL);
        if ($imagen1Valida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->imagen1 = $imagen1Valida;
        }
    }

    public function definirImagen2($imagen2)
    {
        $imagen2Valida = filter_var($imagen2, FILTER_SANITIZE_URL);
        if ($imagen2Valida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->iamgen2 = $imagen2Valida;
        }
    }

    public function definirImagen3($imagen3)
    {
        $imagen3Valida = filter_var($imagen3, FILTER_SANITIZE_URL);
        if ($imagen3Valida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->imagen3 = $imagen3Valida;
        }
    }

    public function definirImagen4($imagen4)
    {
        $imagen4Valida = filter_var($imagen4, FILTER_SANITIZE_URL);
        if ($imagen4Valida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->iamgen4 = $imagen4Valida;
        }
    }

    public function obtenerPais()
    {
        if (is_null($this->pais)){
        throw new Exception("El país no esta definido");
        }   else {
            return $this->pais;
        }
    }

    public function obtenerCiudad()
    {
        if (is_null($this->ciudad)){
        throw new Exception("La ciudad no esta definida");
        }   else {
            return $this->ciudad;
        }
    }

    public function obtenerCodigoPostal()
    {
        if (is_null($this->codigoPostal)){
        throw new Exception("El codigo postal no esta definido");
        }   else {
            return $this->codigoPostal;
        }
    }


    public function obtenerCalle()
    {
        if (is_null($this->calle)){
        throw new Exception("La calle no esta definida");
        }   else {
            return $this->calle;
        }
    }

    public function obtenerImagen1()
    {
        if (is_null($this->imagen1)){
        throw new Exception("Ruta de la imagen no definida");
        }   else {
            return $this->imagen1;
        }
    }


    public function obtenerImagen2()
    {
        if (is_null($this->imagen2)){
        throw new Exception("Ruta de la imagen no definida");
        }   else {
            return $this->imagen2;
        }
    }


    public function obtenerImagen3()
    {
        if (is_null($this->imagen3)){
        throw new Exception("Ruta de la imagen no definida");
        }   else {
            return $this->imagen3;
        }
    }

    public function obtenerImagen4()
    {
        if (is_null($this->imagen4)) {
            throw new Exception("Ruta de la imagen no definida");
        } else {
            return $this->imagen4;
        }
    }

    /**
     * Métodos que realizan las operaciones requeridas
     * por la aplicación en la BD.
     */
    public function insertarDireccion(
        $pais,
        $ciudad,
        $codigo_postal,
        $calle,
        $imagen1,
        $imagen2,
        $imagen3,
        $imagen4,
        $idUsuario
    ) {
        return $this->ejecutarConsulta(
            "INSERT INTO 'direcciones' (`id_usuarios`, `pais`, `ciudad`, `codigo_postal`, `calle`, `imagen1`, `imagen2`, `imagen3`, `imagen4`) VALUE ($idUsuario, '$pais', '$ciudad', '$codigo_postal', '$calle', '$imagen1', '$imagen2', '$imagen3', '$imagen4')"
        );
    }

    public function leerPorIdUsuario($id_usuarios)
    {
        return $this->ejecutarConsulta("SELECT * FROM `direcciones` WHERE `id_usuarios` = $id_usuarios");
    }
}
