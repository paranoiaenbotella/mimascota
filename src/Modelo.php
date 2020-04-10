<?php

class Modelo
{
    private $basededatos;

    private $conexion;

    private $contrasena;

    private $host;

    private $puerto;

    private $usuario;

    private function conectarse()
    {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->basededatos, $this->puerto);
        if ($this->conexion->errno !== 0) {
            exit("No me he podido conectar a la base de datos.");
        }
    }

    protected function ejecutarConsulta($consulta)
    {
        $resultado = $this->conexion->query($consulta);
        if (is_bool($resultado)) {
            return $resultado;
        } else {
            $tabla = [];
            while ($fila = $resultado->fetch_assoc()) {
                array_push($tabla, $fila);
            }
            return $tabla;
        }
    }

    public function __construct()
    {
        $credenciales = require(dirname(__DIR__) . "/config/basededatos.php");
        $this->basededatos = $credenciales["basededatos"];
        $this->contrasena = $credenciales["contrasena"];
        $this->host = $credenciales["host"];
        $this->puerto = $credenciales["puerto"];
        $this->usuario = $credenciales["usuario"];
        $this->conectarse();
    }

    public function __destruct()
    {
        $this->conexion->close();
    }
}
