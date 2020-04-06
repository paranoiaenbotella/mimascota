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

    public function leerPorId($id)
    {
        return $this->ejecutarConsulta("SELECT * FROM `usuarios` WHERE `id` = $id");
    }
}
