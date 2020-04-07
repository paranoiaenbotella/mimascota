<?php


require_once(dirname(__DIR__) . "/Modelos/Rol.php");

class Roles
{
    public function getCrear()
    {
        require_once(dirname(__DIR__) . "/Vistas/Roles/Crear.php");
    }

    public function postCrear()
    {
        if (empty($_POST["nombre"])) {
            echo("No se ha definido el nombre del rol.");
        } else {
            $rol = new Rol();
            if ($rol->insertarRol($_POST["nombre"])) {
                header("Location: /roles/crear");
            } else {
                echo("No se ha podido crear el rol.");
            }
        }
    }
}
