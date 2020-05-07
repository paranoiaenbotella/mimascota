<?php

class Fichero
{
    public function getInicio()
    {
        require_once(dirname(__DIR__) . "/Vistas/Fichero/Inicio.php");
    }

    public function postInicio()
    {
        var_dump($_FILES);
        // Definimos el directorio donde guardaremos el archivo.
        $directorioImagenes = dirname(dirname(__DIR__)) . "/public/img";
        // Comprobamos si el archivo nos ha llegado correctamente:
        if (isset($_FILES["fichero"])) {
            $fichero = $_FILES["fichero"];
            if ($fichero["error"] === 0 && ($fichero["type"] === "image/jpeg" || $fichero["type"] === "image/png")) {
                $ficheroNombre = sha1($fichero["tmp_name"]);
                $ficheroRuta = sprintf("%s/%s", $directorioImagenes, $ficheroNombre);
                move_uploaded_file($fichero["tmp_name"], $ficheroRuta);
                var_dump($ficheroNombre, $ficheroRuta);
            } else {
                echo("El archivo es incorrecto.");
            }
        }
    }
}
