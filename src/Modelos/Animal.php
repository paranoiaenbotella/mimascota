<?php

require_once(dirname(__DIR__) . "/Modelo.php");
/**
 *La clase realiza las operaciones en la
 *base de datos relacionadas con los animales
 */
class Animal extends Modelo
{
    private $id;
    private $animalTipo;
    private $usuario;
    private $nombre;

    /**
     * Se define y se fuerza que el tipo
     * de la $id sea Int
     */
    private function definirId($id) {
        $this->id = (int)$id;
    }

/**
 * Método para obtener el id
 * del animal
 */
    public function obtenerId()
    {
        if (is_null($this->id)) {
            throw new Exception("El identificador del animal no está definido.");
        } else {
            return $this->id;
        }
    }

    /**
     * Se crea al tipo de animal
     */

public function crearAnimalTipo($animalTipo){

    if ($animalTipo instanceof AnimalTipo){
        $this->animalTipo = $animalTipo->obtenerId();
    } else {
        throw new Exception("El parámetro facilitado no es una instancia de la clase AnimalTipo.");

    }
}

/**
 * Método para definir el tipo de animal
 */
public function definirAnimalTipo($animalTipo){
    $this->animalTipo = (int)$animalTipo;
}

/**
 * Método para obtener el tipo de animal
 */
public function obtenerAnimalTipo(){
    if (is_null($this->animalTipo)){
        throw new Exception("El tipo de animal no está definido");
    } else {
        return $this->animalTipo;
    }
}

    /**
     * Se crea al usuario propietario del animal
     */
public function crearUsuario($usuario){

    if ($usuario instanceof Usuario){
        $this->usuario = $usuario->obtenerId();
    } else {
        throw new Exception("El parámetro facilitado no es una instancia de la clase Usuario.");

    }
}

    /**
     * Se define y se fuerza que el tipo
     * de la $usuario sea Int
     */
    public function definirUsuario($usuario){
        $this->usuario = (int)$usuario;
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

/**
 * Método para definir el nombre del animal
 */
    public function definirNombre($nombre)
    {
        $nombreValido = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($nombreValido)) {
            Sesion::definirError("El campo está vacío o el nombre existe.", "nombreAnimal");
        }   else {
            $this->nombre = $nombreValido;
        }
    }

/**
 * Método para obtener el nombre del animal
 */
    public function obtenerNombre(){
        if (is_null($this->nombre)){
        throw new Exception("El nombre del animal no esta definido");
        }   else {
            return $this->nombre;
        }
    }

/**
 * Método para insertar animal
 */
    public function insertar()
    {
        $consulta = $this->conexion->prepare("INSERT INTO `animales` (`id_animales_tipos`, `id_usuarios`,  `nombre`) VALUES (?, ?, ?)");
        $consulta->bind_param("iis", $this->animalTipo, $this->usuario, $this->nombre);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
/**
 * Método para listar por id un animal
 */
    public function listarPorId($id)
    {
        $consulta = $this->conexion->prepare("SELECT * FROM animales WHERE id = ?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            throw new Exception("Animal no encontrado");
        } else {
            $fila = $resultado->fetch_assoc();
            $animal = new Animal();
            $animal->definirId($fila["id"]);
            $animal->definirAnimalTipo($fila["id_animales_tipos"]);
            $animal->definirUsuario($fila["id_usuarios"]);
            $animal->definirNombre($fila["nombre"]);
            return $animal;

       }
    }

/**
 * Método para listar todos los animales
 */
   public function listarAnimales()
   {
        $animales = [];
        $resultado = $this->conexion->query("SELECT * FROM `animales` ORDER BY `id`");
        while ($fila = $resultado->fetch_assoc()) {
            $animal = new Animal();
            $animal->definirId($fila["id"]);
            $animal->definirAnimalTipo($fila["id_animales_tipos"]);
            $animal->definirUsuario($fila["id_usuarios"]);
            $animal->definirNombre($fila["nombre"]);
            array_push($animales, $animal);
        }
       return $animales;
   }

    /**
     * Método para actualizar los animales por id
     */
    public function actualizar()
    {
        $consulta = $this->conexion->prepare(
            "UPDATE `animales` SET `id_animales_tipos` = ?, `id_usuarios` = ?, `nombre` = ? WHERE `id` = ?"
        );
        $consulta->bind_param("iisi", $this->animalTipo, $this->usuario, $this->nombre, $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    /**
     * Método para eliminar los animales por id
     */
    public function eliminar()
    {
        $consulta = $this->conexion->prepare("DELETE FROM `animales` WHERE `id` = ?");
        $consulta->bind_param("i", $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
}
