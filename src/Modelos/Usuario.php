<?php

require_once(dirname(__DIR__) . "/Modelo.php");

class Usuario extends Modelo
{
    private $apellidos;

    private $contrasena;

    private $email;

    private $imagen;

    private $nombre;

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
        $emailValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($emailValido === false) {
            throw new Exception("El correo electrónico proporcionado no es válido.");
        } else {
            $this->email = $emailValido;
        }
    }

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
}
