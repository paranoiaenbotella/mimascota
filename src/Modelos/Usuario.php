<?php

require_once(dirname(__DIR__) . "/Modelo.php");

class Usuario extends Modelo
{
    public function insertarUsuario($nombre, $apellidos, $email, $contrasena, $imagen, $idRol)
    {
        return $this->ejecutarConsulta(
            "INSERT INTO `usuarios` (`nombre`, `apellidos`, `email`, `contrasena`, `imagen`, `id_roles`) VALUE ('$nombre', '$apellidos', '$email', '$contrasena', '$imagen', $idRol)"
        );
    }

    public function insertarCuidador($nobmre, $apellidos, $email, $contrasena, $imagen)
    {
        $cuidadorConsulta = "SELECT `id` FROM `roles` WHERE `nombre` = 'Cuidador'";
        $cuidador = $this->ejecutarConsulta($cuidadorConsulta);
        return $this->insertarUsuario($nobmre, $apellidos, $email, $contrasena, $imagen, $cuidador["id"]);
    }

    public function insertarPropietario($nombre, $apellidos, $email, $contrasena, $imagen)
    {
        $propietarioConsulta = "SELECT `id` FROM `roles` WHERE `nombre`= 'Propietario'";
        $propietario = $this->ejecutarConsulta($propietarioConsulta);
        return $this->insertarUsuario($nombre, $apellidos, $email, $contrasena, $imagen, $propietario["id"]);
    }

    public function leerPorId($id)
    {
        return $this->ejecutarConsulta("SELECT * FROM `usuarios` WHERE `id` = $id");
    }
}
