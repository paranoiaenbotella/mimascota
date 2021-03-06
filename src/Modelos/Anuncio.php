<?php

require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * Operaciones contra la tabla anuncios
 */
class Anuncio extends Modelo
{
    private $descripcion;

    private $fecha;

    private $id;

    private $idAnimalesTipos = [];

    private $idServicios = [];

    private $imagen1;

    private $imagen2;

    private $imagen3;

    private $imagen4;

    private $nombre;

    private $usuario;

    /**
     * Se define y se fuerza que el tipo
     * de la $id sea Int
     */
    private function definirId($id)
    {
        $this->id = (int)$id;
    }

    public function actualizar()
    {
        $consulta = $this->conexion->prepare(
            "UPDATE `anuncios` SET `id_usuarios` = ?, `descripcion` = ?, `imagen1` = ?, `imagen2` = ?, `imagen3` = ?, `imagen4` = ? WHERE `id` = ?"
        );
        $consulta->bind_param(
            "isssssi",
            $this->usuario,
            $this->descripcion,
            $this->imagen1,
            $this->imagen2,
            $this->imagen3,
            $this->imagen4,
            $this->id
        );
        $resultado = $consulta->execute();
        $consulta->close();
        if ($resultado) {
            $consulta2 = $this->conexion->prepare("DELETE FROM `anuncios_servicios` WHERE `id_anuncios` = ?");
            $consulta2->bind_param("i", $this->id);
            $consulta2->execute();
            $consulta2->close();
            $consulta3 = $this->conexion->prepare(
                "INSERT INTO `anuncios_servicios` (`id_anuncios`, `id_servicios`) VALUES (?, ?)"
            );
            foreach ($this->idServicios as $idServicio) {
                $consulta3->bind_param("ii", $this->id, $idServicio);
                $consulta3->execute();
            }
            $consulta3->close();
            $consulta4 = $this->conexion->prepare("DELETE FROM `anuncios_animales_tipos` WHERE `id_anuncios` = ?");
            $consulta4->bind_param("i", $this->id);
            $consulta4->execute();
            $consulta4->close();
            $consulta5 = $this->conexion->prepare(
                "INSERT INTO `anuncios_animales_tipos` (`id_anuncios`, `id_animales_tipos`) VALUES (?, ?)"
            );
            foreach ($this->idAnimalesTipos as $idAnimalesTipo) {
                $consulta5->bind_param("ii", $this->id, $idAnimalesTipo);
                $consulta5->execute();
            }
            $consulta5->close();
        }
        return $resultado;
    }

    public function crearIdAnimalesTipos($animalTipo)
    {
        if ($animalTipo instanceof AnimalTipo) {
            array_push($this->idAnimalesTipos, $animalTipo->obtenerId());
        } else {
            // TODO: Something went wrong.
        }
        return $this;
    }

    public function crearIdServicios($servicio)
    {
        if ($servicio instanceof Servicio) {
            array_push($this->idServicios, $servicio->obtenerId());
        } else {
            // TODO: Something went wrong.
        }
    }

    /**
     * Se crea al usuario propietario del anuncio
     */
    public function crearUsuario($usuario)
    {
        if ($usuario instanceof Usuario) {
            $this->usuario = $usuario->obtenerId();
        } else {
            throw new Exception("El parámetro facilitado no es una instancia de la clase Usuario.");
        }
    }

    /**
     * Método para definir la descripción
     */
    public function definirDescripcion($descripcion)
    {
        if (empty($descripcion)) {
            Sesion::definirError("No se ha introducido una descripción.", "descripcionAnuncio");
        } else {
            $this->descripcion = filter_var($descripcion, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $this;
    }

    /**
     * Método para definir la fecha de creación
     */
    public function definirFecha($fecha) // TODO: What is this?
    {
        if (is_null($fecha)) {
        } else {
            $this->fecha = date("d/m/y ", strtotime($fecha));
        }
        return $this;
    }

    public function definirIdAnimalesTipos($idAnimalesTipos)
    {
        if (is_array($this->idAnimalesTipos)) {
            $this->idAnimalesTipos = $idAnimalesTipos;
        } else {
            // TODO: Something went wrong.
        }
    }

    public function definirIdServicios(array $idServicios)
    {
        if (is_array($this->idAnimalesTipos)) {
            $this->idServicios = $idServicios;
        } else {
            // TODO: Something went wrong.
        }
    }

    /**
     * Método para definir la imagen 1
     */
    public function definirImagen1($imagen1)
    {
        if (is_array($imagen1)) {
            $imagen1Nombre = sha1($imagen1["tmp_name"]);
            $imagen1Direccion = sprintf("%s/public/img/%s", dirname(dirname(__DIR__)), $imagen1Nombre);
            if (move_uploaded_file($imagen1["tmp_name"], $imagen1Direccion)) {
                $this->imagen1 = sprintf("/img/%s", $imagen1Nombre);
            } else {
                Sesion::definirError("La imagen no es valida, prueba .jpg o .png .", "imagen");
            }
        } else {
            $this->imagen1 = $imagen1;
        }
    }

    /**
     * Método para definir la imagen 2
     */
    public function definirImagen2($imagen2)
    {
        if (is_array($imagen2)) {
            $imagen2Nombre = sha1($imagen2["tmp_name"]);
            $imagen2Direccion = sprintf("%s/public/img/%s", dirname(dirname(__DIR__)), $imagen2Nombre);
            if (move_uploaded_file($imagen2["tmp_name"], $imagen2Direccion)) {
                $this->imagen2 = sprintf("/img/%s", $imagen2Nombre);
            } else {
                Sesion::definirError("La imagen no es valida, prueba .jpg o .png .", "imagen");
            }
        } else {
            $this->imagen2 = $imagen2;
        }
    }

    /**
     * Método para definir la imagen 3
     */
    public function definirImagen3($imagen3)
    {
        if (is_array($imagen3)) {
            $imagen3Nombre = sha1($imagen3["tmp_name"]);
            $imagen3Direccion = sprintf("%s/public/img/%s", dirname(dirname(__DIR__)), $imagen3Nombre);
            if (move_uploaded_file($imagen3["tmp_name"], $imagen3Direccion)) {
                $this->imagen3 = sprintf("/img/%s", $imagen3Nombre);
            } else {
                Sesion::definirError("La imagen no es valida, prueba .jpg o .png .", "imagen");
            }
        } else {
            $this->imagen3 = $imagen3;
        }
    }

    /**
     * Método para definir la imagen 4
     */
    public function definirImagen4($imagen4)
    {
        if (is_array($imagen4)) {
            $imagen4Nombre = sha1($imagen4["tmp_name"]);
            $imagen4Direccion = sprintf("%s/public/img/%s", dirname(dirname(__DIR__)), $imagen4Nombre);
            if (move_uploaded_file($imagen4["tmp_name"], $imagen4Direccion)) {
                $this->imagen4 = sprintf("/img/%s", $imagen4Nombre);
            } else {
                Sesion::definirError("La imagen no es valida, prueba .jpg o .png .", "imagen");
            }
        } else {
            $this->imagen4 = $imagen4;
        }
    }

    public function definirNombre($nombre)
    {
        $nombreValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($nombreValido === false) {
            // IMPROVE: Something went wrong.
        } else {
            $this->nombre = $nombreValido;
        }
    }

    /**
     * Se define y se fuerza que el tipo
     * de la $usuario sea Int
     */
    public function definirUsuario($usuario)
    {
        $this->usuario = (int)$usuario;
    }

    public function insertar() // FIX: The query must be reviewed and improved.
    {
        $consulta = $this->conexion->prepare(
            "INSERT INTO `anuncios` (`id_usuarios`, `nombre`, `descripcion`, `imagen1`, `imagen2`, `imagen3`, `imagen4`) VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        $consulta->bind_param(
            "issssss",
            $this->usuario,
            $this->nombre,
            $this->descripcion,
            $this->imagen1,
            $this->imagen2,
            $this->imagen3,
            $this->imagen4
        );
        $resultado = $consulta->execute();
        $consulta->close();
        $this->definirId($this->conexion->insert_id);
        if ($resultado) {
            $consulta2 = $this->conexion->prepare(
                "INSERT INTO `anuncios_animales_tipos` (`id_anuncios`, `id_animales_tipos`) VALUES (?, ?)"
            );
            foreach ($this->idAnimalesTipos as $idServicio) {
                $consulta2->bind_param("ii", $this->id, $idServicio);
                $consulta2->execute();
            }
            $consulta2->close();
            $consulta3 = $this->conexion->prepare(
                "INSERT INTO `anuncios_servicios` (`id_anuncios`, `id_servicios`) VALUES (?, ?)"
            );
            foreach ($this->idServicios as $idServicio) {
                $consulta3->bind_param("ii", $this->id, $idServicio);
                $consulta3->execute();
            }
            $consulta3->close();
        } else {
            // TODO: Something went wrong.
        }
        return $resultado;
    }

    public function listarAnuncios()
    {
        $anuncios = [];
        $resultado = $this->conexion->query("SELECT * FROM `anuncios` ORDER BY `fecha_creacion` DESC");
        while ($fila = $resultado->fetch_assoc()) {
            $anuncio = new Anuncio();
            $anuncio->definirId($fila["id"]);
            $anuncio->definirUsuario($fila["id_usuarios"]);
            $anuncio->definirNombre($fila["nombre"]);
            $anuncio->definirDescripcion($fila["descripcion"]);
            $anuncio->definirFecha($fila["fecha_creacion"]);
            $anuncio->definirImagen1($fila["imagen1"]);
            $anuncio->definirImagen2($fila["imagen2"]);
            $anuncio->definirImagen3($fila["imagen3"]);
            $anuncio->definirImagen4($fila["imagen4"]);
            $consulta2 = $this->conexion->prepare("SELECT * FROM `anuncios_animales_tipos` WHERE `id_anuncios` = ?");
            $consulta2->bind_param("i", $anuncio->id);
            $consulta2->execute();
            $resultado2 = $consulta2->get_result();
            $consulta2->close();
            $idAnimalesTipos = [];
            while ($fila2 = $resultado2->fetch_assoc()) {
                array_push($idAnimalesTipos, $fila2["id_animales_tipos"]);
            }
            $anuncio->definirIdAnimalesTipos($idAnimalesTipos);
            $consulta3 = $this->conexion->prepare("SELECT * FROM `anuncios_servicios` WHERE `id_anuncios` = ?");
            $consulta3->bind_param("i", $anuncio->id);
            $consulta3->execute();
            $resultado2 = $consulta3->get_result();
            $consulta3->close();
            $idServicios = [];
            while ($fila3 = $resultado2->fetch_assoc()) {
                array_push($idServicios, $fila3["id_servicios"]);
            }
            $anuncio->definirIdServicios($idServicios);
            array_push($anuncios, $anuncio);
        }
        return $anuncios;
    }

    public function listarPorId($id)
    {
        $consulta = $this->conexion->prepare("SELECT * FROM `anuncios` WHERE `id` = ?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            return false;
        } else {
            $fila = $resultado->fetch_assoc();
            $anuncio = new Anuncio();
            $anuncio->definirId($fila["id"]);
            $anuncio->definirUsuario($fila["id_usuarios"]);
            $anuncio->definirNombre($fila["nombre"]);
            $anuncio->definirDescripcion($fila["descripcion"]);
            $anuncio->definirFecha($fila["fecha_creacion"]);
            $anuncio->definirImagen1($fila["imagen1"]);
            $anuncio->definirImagen2($fila["imagen2"]);
            $anuncio->definirImagen3($fila["imagen3"]);
            $anuncio->definirImagen4($fila["imagen4"]);
            $consulta2 = $this->conexion->prepare("SELECT * FROM `anuncios_animales_tipos` WHERE `id_anuncios` = ?");
            $consulta2->bind_param("i", $anuncio->id);
            $consulta2->execute();
            $resultado2 = $consulta2->get_result();
            $consulta2->close();
            $idAnimalesTipos = [];
            while ($fila2 = $resultado2->fetch_assoc()) {
                array_push($idAnimalesTipos, $fila2["id_animales_tipos"]);
            }
            $anuncio->definirIdAnimalesTipos($idAnimalesTipos);
            $consulta3 = $this->conexion->prepare("SELECT * FROM `anuncios_servicios` WHERE `id_anuncios` = ?");
            $consulta3->bind_param("i", $anuncio->id);
            $consulta3->execute();
            $resultado2 = $consulta3->get_result();
            $consulta3->close();
            $idServicios = [];
            while ($fila3 = $resultado2->fetch_assoc()) {
                array_push($idServicios, $fila3["id_servicios"]);
            }
            $anuncio->definirIdServicios($idServicios);
        }
        return $anuncio;
    }

    public function listarPorUsuario($usuario)
    {
        $consulta = $this->conexion->prepare("SELECT * FROM `anuncios` WHERE `id_usuarios` = ?");
        $consulta->bind_param("i", $usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            return false;
        } else {
            $fila = $resultado->fetch_assoc();
            $anuncio = new Anuncio();
            $anuncio->definirId($fila["id"]);
            $anuncio->definirUsuario($fila["id_usuarios"]);
            $anuncio->definirNombre($fila["nombre"]);
            $anuncio->definirDescripcion($fila["descripcion"]);
            $anuncio->definirFecha($fila["fecha_creacion"]);
            $anuncio->definirImagen1($fila["imagen1"]);
            $anuncio->definirImagen2($fila["imagen2"]);
            $anuncio->definirImagen3($fila["imagen3"]);
            $anuncio->definirImagen4($fila["imagen4"]);
            $consulta2 = $this->conexion->prepare("SELECT * FROM `anuncios_animales_tipos` WHERE `id_anuncios` = ?");
            $consulta2->bind_param("i", $anuncio->id);
            $consulta2->execute();
            $resultado2 = $consulta2->get_result();
            $consulta2->close();
            $idAnimalesTipos = [];
            while ($fila2 = $resultado2->fetch_assoc()) {
                array_push($idAnimalesTipos, $fila2["id_animales_tipos"]);
            }
            $anuncio->definirIdAnimalesTipos($idAnimalesTipos);
            $consulta3 = $this->conexion->prepare("SELECT * FROM `anuncios_servicios` WHERE `id_anuncios` = ?");
            $consulta3->bind_param("i", $anuncio->id);
            $consulta3->execute();
            $resultado2 = $consulta3->get_result();
            $consulta3->close();
            $idServicios = [];
            while ($fila3 = $resultado2->fetch_assoc()) {
                array_push($idServicios, $fila3["id_servicios"]);
            }
            $anuncio->definirIdServicios($idServicios);
        }
        return $anuncio;
    }

    /**
     * Listar ultimos 10 anuncios
     */
    public function listarUltimosDiez()
    {
        $anuncios = [];
        $resultado = $this->conexion->query("SELECT * FROM `anuncios` ORDER BY `fecha_creacion` LIMIT 10");
        while ($fila = $resultado->fetch_assoc()) {
            $anuncio = new Anuncio();
            $anuncio->definirId($fila["id"]);
            $anuncio->definirUsuario($fila["id_usuarios"]);
            $anuncio->definirDescripcion($fila["descripcion"]);
            $anuncio->definirFecha($fila["fecha_creacion"]);
            $anuncio->definirImagen1($fila["imagen1"]);
            $anuncio->definirImagen2($fila["imagen2"]);
            $anuncio->definirImagen3($fila["imagen3"]);
            $anuncio->definirImagen4($fila["imagen4"]);
            array_push($anuncios, $anuncio);
        }
        return $anuncios;
    }

    /**
     * Eliminar Anuncio
     */
    public function eliminar()
    {
        $consulta = $this->conexion->prepare("DELETE FROM `anuncios` WHERE `id` = ?");
        $consulta->bind_param("i", $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    /**
     * Método para obtener la descripción
     */
    public function obtenerDescripcion()
    {
        if (is_null($this->descripcion)) {
            throw new Exception("La descripción no esta definida.");
        } else {
            return $this->descripcion;
        }
    }

    /**
     * Método para obtener la fecha de creación
     */
    public function obtenerFecha()
    {
        if (is_null($this->fecha)) {
            throw new Exception("La fecha no está definida");
        } else {
            return $this->fecha;
        }
    }

    /**
     * Método para obtener el id
     */
    public function obtenerId()
    {
        if (is_null($this->id)) {
            throw new Exception("El identificador del anuncio no está definido.");
        } else {
            return $this->id;
        }
    }

    public function obtenerIdAnimalesTipos()
    {
        $animalesTipos = [];
        $animalTipo = new AnimalTipo();
        foreach ($this->idAnimalesTipos as $idAnimalesTipo) {
            array_push($animalesTipos, $animalTipo->listarPorId($idAnimalesTipo));
        }
        return $animalesTipos;
    }

    public function obtenerIdServicios(){
        $servicios = [];
        $servicio = new Servicio();
        foreach ($this->idServicios as $idServicio) {
            array_push($servicios, $servicio->listarPorId($idServicio));
        }
        return $servicios;

    }

    /**
     * Método para obtener la imagen 1
     */
    public function obtenerImagen1()
    {
        if (is_null($this->imagen1)) {
            throw new Exception("Ruta de la imagen no definida");
        } else {
            return $this->imagen1;
        }
    }

    /**
     * Método para obtener la imagen 2
     */
    public function obtenerImagen2()
    {
        if (is_null($this->imagen2)) {
            throw new Exception("Ruta de la imagen no definida");
        } else {
            return $this->imagen2;
        }
    }

    /**
     * Método para obtener la imagen 3
     */
    public function obtenerImagen3()
    {
        if (is_null($this->imagen3)) {
            throw new Exception("Ruta de la imagen no definida");
        } else {
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

    public function obtenerNombre()
    {
        if (is_null($this->nombre)) {
            // IMPROVE: The property nombre is not defined.
        } else {
            return $this->nombre;
        }
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
}
