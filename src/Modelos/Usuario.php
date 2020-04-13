<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD, los métodos
 * que definen, obtienen y validan los datos.
 */
class Usuario extends Modelo
{
    private $apellidos;

    private $contrasena;

    private $email;

    private $imagen;

    private $nombre;

 /**
 * Métodos para validar datos
 */

    private function comprobarContrasenaLongitud($contrasena)
    {
        if (strlen($contrasena) < 8) {
            throw new Exception("La contraseña es demasiado corta.");
        } else {
            return true;
        }
    }

    private function comprobarContrasenaVerificacion($contrasena, $contrasenaVerificada)
    {
        if ($contrasena === $contrasenaVerificada) {
            return true;
        } else {
            throw new Exception("La verificación de la contraseña ha fallado.");
        }
    }

    private function firmarContrasena($contrasena)
    {
        return sha1($contrasena);
    }

/**
 * Métodos para definir y obtener datos
 */

    public function definirContrasena($contrasena, $contrasenaVerificada)
    {
        try {
            $this->comprobarContrasenaLongitud($contrasena);
            $this->comprobarContrasenaVerificacion($contrasena, $contrasenaVerificada);
            $this->contrasena = $this->firmarContrasena($contrasena);
        } catch (Exception $exception) {
            var_dump($exception);
        }
    }

    public function definirEmail($email)
    {
        $emailValido = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($emailValido === false) {
            throw new Exception("El correo electrónico proporcionado no es válido.");
        } else {
            $this->email = $emailValido;
        }
    }

    public function definirNombre($nombre)
    {
        $nombreValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($nombreValido === false) {
            throw new Exception("El nombre introducido no es valido");

        }   else {
            $this->nombre = $nombreValido;
        }
    }

    public function definirApellidos($apellidos)
    {
        $apellidosValidos = filter_var($apellidos, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($apellidosValidos === false) {
            throw new Exception("Los apellidos introducidos no son validos");
        }   else {
            $this->apellidos = $apellidosValidos;
        }
    }
    public function definirImagen($imagen)
    {
        $imagenValida = filter_var($imagen, FILTER_SANITIZE_URL);
        if ($imagenValida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        }   else {
            $this->imagen = $imagenValida;
        }
    }

    public function obtenerContrasena()
    {
        if (is_null($this->contrasena)) {
            throw new Exception("La contraseña no está definida.");
        } else {
            return $this->contrasena;
        }
    }

    public function obtenerEmail()
    {
        if (is_null($this->email)) {
            throw new Exception("El correo electrónico no está definido.");
        } else {
            return $this->email;
        }
    }

    public function obtenerNombre()
    {
        if (is_null($this->nombre)) {
            throw new Exception("El nombre no esta definido");
        } else {
            return $this->nombre;
        }
    }

    public function obtenerApellidos()
    {
        if (is_null($this->apellidos)) {
            throw new Exception("Los apellidos no estan definidos");
        } else {
            return $this->apellidos;
        }
    }

    public function obtenerImagen()
    {
        if (is_null($this->imgen)) {
            throw new Exception("Ruta de la imagen no definida");
        } else {
            return $this->imagen;
        }
    }

    /**
     * Métodos que realizan las operaciones requeridas
     * por la aplicación en la BD.
     */
    public function insertar()
    {
        return $this->ejecutarConsulta(
            "INSERT INTO `usuarios` (`id_roles`, `email`, `contrasena`, `nombre`, `apellidos`) VALUE ($this->rol, '$this->email', '$this->contrasena', '$this->nombre', '$this->apellidos')"
        );
    }

    public function insertarCuidador(
        $nobmre,
        $apellidos,
        $email,
        $contrasena,
        $imagen
    ) // TODO: Este métido necesita ser refactorizado o eliminado.
    {
        $cuidadorConsulta = "SELECT `id` FROM `roles` WHERE `nombre` = 'Cuidador'";
        $cuidador = $this->ejecutarConsulta($cuidadorConsulta);
        return $this->insertarUsuario($nobmre, $apellidos, $email, $contrasena, $imagen, $cuidador["id"]);
    }

    public function insertarPropietario(
        $nombre,
        $apellidos,
        $email,
        $contrasena,
        $imagen
    ) // TODO: Este métido necesita ser refactorizado o eliminado.
    {
        $propietarioConsulta = "SELECT `id` FROM `roles` WHERE `nombre`= 'Propietario'";
        $propietario = $this->ejecutarConsulta($propietarioConsulta);
        return $this->insertarUsuario($nombre, $apellidos, $email, $contrasena, $imagen, $propietario["id"]);
    }

    public function insertarUsuario(
        $nombre,
        $apellidos,
        $email,
        $contrasena,
        $imagen,
        $idRol
    ) // TODO: Este métido necesita ser refactorizado o eliminado.
    {
        return $this->ejecutarConsulta(
            "INSERT INTO `usuarios` (`nombre`, `apellidos`, `email`, `contrasena`, `imagen`, `id_roles`) VALUE ('$nombre', '$apellidos', '$email', '$contrasena', '$imagen', $idRol)"
        );
    }

    public function leerPorId($id) // TODO: Este método necesita ser refactorizado o eliminado.
    {
        return $this->ejecutarConsulta("SELECT * FROM `usuarios` WHERE `id` = $id");
    }

}
