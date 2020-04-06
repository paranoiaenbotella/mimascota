<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase Dirección realiza las consultas relacionadas con la dirección del usuario.
 */
class Direccion extends Modelo
{
    /**
     * Este método inserta una dirección, vinculada a un usuario, a la base de datos.
     */
    public function insertarDireccion($pais, $ciudad, $codigo_postal, $calle, $imagen1, $imagen2, $imagen3, $imagen4, $idUsuario) {
        return $this->ejecutarConsulta(
            "INSERT INTO 'direcciones' (`id_usuarios`, `pais`, `ciudad`, `codigo_postal`, `calle`, `imagen1`, `imagen2`, `imagen3`, `imagen4`) VALUE ($idUsuario, '$pais', '$ciudad', '$codigo_postal', '$calle', '$imagen1', '$imagen2', '$imagen3', '$imagen4')"
        );
    }

    public function leerPorIdUsuario($id_usuarios)
    {
        return $this->ejecutarConsulta("SELECT * FROM `direcciones` WHERE `id_usuarios` = $id_usuarios");
    }
}
