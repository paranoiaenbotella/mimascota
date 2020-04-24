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

    private $rol;

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

    public function definirApellidos($apellidos)
    {
        if (empty($apellidos)) {
            throw new Exception("Los apellidos introducidos no son validos");
        } else {
            $this->apellidos = filter_var($apellidos, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $this;
    }

    /**
     * Métodos para definir los datos
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
        return $this;
    }

    public function definirEmail($email)
    {
        $emailValido = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($emailValido === false) {
            throw new Exception("El correo electrónico proporcionado no es válido.");
        } else {
            $this->email = $emailValido;
        }
        return $this;
    }

    public function definirImagen($imagen)
    {
        $imagenValida = filter_var($imagen, FILTER_SANITIZE_URL);
        if ($imagenValida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        } else {
            $this->imagen = $imagenValida;
        }
    }

    public function definirNombre($nombre)
    {
        $nombreValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($nombreValido === false) {
            throw new Exception("El nombre introducido no es valido");
        } else {
            $this->nombre = $nombreValido;
        }
        return $this;
    }

    public function definirRol($rol)
    {
        if ($rol instanceof Rol) {
            $this->rol = $rol->obtenerId();
        } else {
            throw new Exception("El parametro facilitado no es una instancia de la clase Rol");
        }
        return $this;
    }

    /**
     * Método que inserta usuarios en la BD
     */
    public function insertar()
    {
        $consulta = $this->conexion->prepare(
            "INSERT INTO `usuarios` (`id_roles`, `email`, `contrasena`, `nombre`, `apellidos`) VALUES (?, ?, ?, ?, ?)"
        );
        $consulta->bind_param("issss", $this->rol, $this->email, $this->contrasena, $this->nombre, $this->apellidos);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    /**
     * Método que lista los usuarios de la BD
     */
    public function listarUsuarios()
    {
        
    }
        /**
     * Método que lista el usuario con el ID facilitado
     */
    public function leerPorId($id) // TODO: Este método necesita ser refactorizado o eliminado.
    {
        return $this->ejecutarConsulta("SELECT * FROM `usuarios` WHERE `id` = $id");
    }

    /**
     * Métodos para obtener los datos
     */
    public function obtenerApellidos()
    {
        if (is_null($this->apellidos)) {
            throw new Exception("Los apellidos no estan definidos");
        } else {
            return $this->apellidos;
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

    public function obtenerImagen()
    {
        if (is_null($this->imagen)) {
            throw new Exception("Ruta de la imagen no definida");
        } else {
            return $this->imagen;
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
}
