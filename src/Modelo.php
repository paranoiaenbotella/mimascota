<?php

class Modelo
{
    private $basededatos = "mimascota";

    /**
     * @var \mysqli
     */
    private $conexion;

    private $contrasena = "mimascota";

    private $host = "localhost";

    private $puerto = 3306;

    private $usuario = "mimascota";

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
            return $resultado->fetch_assoc();
        }
    }

    public function __construct()
    {
        $this->conectarse();
    }
}
