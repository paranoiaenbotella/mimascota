<?php

/**
 *requiere_once, instrucción de incluir el archivo Modelo.php,
 *se verifica una vez dicha inclusión.
 *dirname(__DIR__) . "/Modelo.php", dirección completa del archivo.
 */
require_once(dirname(__DIR__) . "/Modelo.php");

/**
 * La clase contiene las operaciones contra la BD, los métodos
 * que definen, obtienen y validan los datos.
 * La clase Usuario extiende la clase Modelo.
 * Es decir Usuario es hija de Modelo,por lo cual
 * hereda sus atributos y métodos.
 */
class Usuario extends Modelo
{
    /**
     * Declaración de propiedades de la clase.
     * Las propiedades son privadas, por lo cual para
     * acceder a ellas se crearan los métodos definir y obtener
     */
    private $apellidos;

    private $contrasena;

    private $email;

    private $id;

    private $imagen;

    private $movil;

    private $nombre;

    private $rol;

    /**
     * Método que comprueba la longitud de la contraseña
     * Si la contraseña tiene la longitud menor que 8,
     * se lanza una excepción mostrando el mensaje, si no,
     * retornara un verdadero. Las excepciones paran la ejecución
     * del script.
     */
    private function comprobarContrasenaLongitud($contrasena)
    {
        if (strlen($contrasena) < 8) {
            Sesion::definirError("La contraseña es demasiado corta.", "constrasena");
        } else {
            return true;
        }
    }

    /**
     * Comprueba que la contraseña y la confirmación son la misma.
     * Si la contraseña y la repetición de la misma son idénticas
     * retorna verdadero, si no, lanza una excepción mostrando el
     * mensaje.
     */
    private function comprobarContrasenaVerificacion($contrasena, $contrasenaVerificada)
    {
        if ($contrasena === $contrasenaVerificada) {
            return true;
        } else {

            Sesion::definirError("La contraseñas no coinciden.", "contrasenaVerificada");
        }
    }

    /**
     * Se define y se fuerza que el tipo
     * de la $id sea Int
     */
    private function definirId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * Firma la contraseña utilizando el algoritmo
     * sha1.
     */
    private function firmarContrasena($contrasena)
    {
        return sha1($contrasena);
    }

    /**
     * Método para actualizar usuario por id
     */
    public function actualizar()
    {
        $consulta = $this->conexion->prepare(
            "UPDATE `usuarios` SET `id_roles` = ?, `email` = ?, `movil` = ?, `contrasena` = ?, `nombre` = ?, `apellidos` = ?, `imagen` = ? WHERE `id` =?"
        );
        $consulta->bind_param(
            "issssssi",
            $this->rol,
            $this->email,
            $this->movil,
            $this->contrasena,
            $this->nombre,
            $this->apellidos,
            $this->imagen,
            $this->id
        );
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    /**
     * Método para crear la contraseña
     * se utiliza un bloque try para capturar posibles
     * excepciones al ejecutar los métodos de verificación
     *  y de la firma de contraseña finalmente retornandola
     */
    public function crearContrasena($contrasena, $contrasenaVerificada)
    {
        $this->comprobarContrasenaLongitud($contrasena);
        $this->comprobarContrasenaVerificacion($contrasena, $contrasenaVerificada);
        $this->contrasena = $this->firmarContrasena($contrasena);
        return $this;
    }

    /**
     * Crear rol para el registro
     * Si existe una instancia de Rol
     * al objeto rol se le asigna el
     * resultado del método obtenerId()
     * si no, se lanza una nueva excepción
     * la función retornara la clase Usuario
     */
    public function crearRol($rol)
    {
        if ($rol instanceof Rol) {
            $this->rol = $rol->obtenerId();
        } else {
            throw new Exception("El parámetro facilitado no es una instancia de la clase Rol");
        }
        return $this;
    }

    /**
     * Definir apellidos
     * Si la variable $apellidos esta vacia se lanza una
     * excepción. Se le aplica a $apellidos un filtro de
     * saneamiento.
     */
    public function definirApellidos($apellidos)
    {
        if (empty($apellidos)) {
            Sesion::definirError("Los apellidos introducidos no son validos.", "apellidos");
        } else {
            $this->apellidos = filter_var($apellidos, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            Sesion::definirFormulario("apellidos", $this->apellidos);
        }
        return $this;
    }

    public function definirContrasena($contrasena)
    {
        $contrasenaValida = filter_var($contrasena, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($contrasenaValida === false) {
            Sesion::definirError(new Exception("Contraseña no valida"), "contrasena");
        } else {
            $this->contrasena = $contrasenaValida;
        }
    }

    /**
     * Definir email
     * Se le aplica al email un filtro de saneamiento y
     * el resultado se guarda en la variable $emailValido
     * Si el resultado es idéntico a false se lanza una
     * excepción. Si no, el valor del email es el resultado
     * del saneamiento.
     */
    public function definirEmail($email)
    {
        $emailValido = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($emailValido, FILTER_VALIDATE_EMAIL)) {
            Sesion::definirError("El correo electrónico proporcionado no es válido.", "email");
        } else {
            $this->email = $emailValido;
        }
        empty($emailValido) ?: Sesion::definirFormulario("email", $emailValido);
        return $this;
    }

    /**
     * Definir imagen.
     * El filtro aplicado es de saneamiento de una url
     */
    public function definirImagen($imagen)
    {
        $imagenValida = filter_var($imagen, FILTER_SANITIZE_URL);
        if ($imagenValida === false) {
            throw new Exception("La ruta de la imagen es incorrecta");
        } else {
            $this->imagen = $imagenValida;
        }
    }

    /**
     * Método para definir el móvil
     */
    public function definirMovil($movil)
    {
        $movilValido = filter_var($movil, FILTER_SANITIZE_NUMBER_INT);
        if ($movilValido < 9) {
            Sesion::definirError("El número de móvil proporcionado no es válido", "movil");
        } else {
            $this->movil = $movilValido;
        }
        return $this;
    }

    /**
     * Definir nombre.
     * El filtro aplicado es de saneamiento codifica
     * el código y el navegador no lo interpreta.
     */
    public function definirNombre($nombre)
    {
        if (empty($nombre)) {
            Sesion::definirError("El nombre introducido no es valido.", "nombre");
        } else {
            $this->nombre = filter_var($nombre, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            Sesion::definirFormulario("nombre", $this->nombre);
        }
        return $this;
    }

    /**
     * Se define y se fuerza que el tipo
     * de la $id sea Int
     */
    public function definirRol($rol)
    {
        $this->rol = (int)$rol;
    }

    /**
     * Método para eliminar usuario por id
     */
    public function eliminar()
    {
        $consulta = $this->conexion->prepare("DELETE FROM `usuarios` WHERE `id` = ?");
        $consulta->bind_param("i", $this->id);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    public function identificar($email, $contrasena)
    {
        try {
            $cuenta = $this->listarPorEmail($email);
            if ($cuenta->obtenerContrasena() === sha1($contrasena)) {
                return $cuenta;
            } else {
                throw new Exception();
            }
        } catch (Exception $exception) {
            throw new Exception("Las credenciales son incorrectas.");
        }
    }

    /**
     * Método que inserta usuarios en la BD
     * A la variable $consulta se le asigna la consulta
     * a la BD en este caso la inserción de datos.
     * A la $consulta de se vincula 5 parámetros (uno de tipo
     * Int y 4 de tipo String, mediante bind_param()
     * A la $resultado se le asigna la ejecución de la consulta
     * Se cierra la consulta mediante close();
     * Se retorna el resultado de la ejecución de la consulta
     */
    public function insertar()
    {
        $consulta = $this->conexion->prepare(
            "INSERT INTO `usuarios` (`id_roles`, `email`, `movil`, `contrasena`, `nombre`, `apellidos`) VALUES (?, ?, ?, ?, ?, ?)"
        );
        $consulta->bind_param(
            "isssss",
            $this->rol,
            $this->email,
            $this->movil,
            $this->contrasena,
            $this->nombre,
            $this->apellidos
        );
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    public function listarPorEmail($email)
    {
        $consulta = $this->conexion->prepare("SELECT * FROM `usuarios` WHERE `email` = ?");
        $consulta->bind_param("s", $email);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
        if (empty($resultado->num_rows)) {
            throw new Exception("Email no encontrado");
        } else {
            $fila = $resultado->fetch_assoc();
            $usuario = new Usuario();
            $usuario->definirEmail($fila["email"]);
            $usuario->definirId($fila["id"]);
            $usuario->definirNombre($fila["nombre"]);
            $usuario->definirApellidos($fila["apellidos"]);
            $usuario->definirContrasena($fila["contrasena"]);
            $usuario->definirImagen($fila["imagen"]);
            $usuario->definirRol($fila["id_roles"]);
            return $usuario;
        }
    }

    /**
     * Método que lista el usuario con el ID facilitado
     */
    public function listarPorId($id)
    {
        $consulta = $this->conexion->prepare("SELECT * FROM `usuarios` WHERE `id` =?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $resultado = $consulta->get_result();
        if (empty($resultado->num_rows)) {
            throw new Exception("Usuario no encontrado");
        } else {
            $fila = $resultado->fetch_assoc();
            $usuario = new Usuario();
            $usuario->definirId($fila["id"]);
            $usuario->definirRol($fila["id_roles"]);
            $usuario->definirEmail($fila["email"]);
            $usuario->definirMovil($fila["movil"]);
            $usuario->definirNombre($fila["nombre"]);
            $usuario->definirApellidos($fila["apellidos"]);
            $usuario->definirImagen($fila["imagen"]);
            return $usuario;
        }
    }

    /**
     * Método que lista los usuarios de la BD
     */
    public function listarUsuarios()
    {
        $usuarios = [];
        $resultado = $this->conexion->query("SELECT * FROM `usuarios` ORDER BY `apellidos`");
        while ($fila = $resultado->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->definirId($fila["id"]);
            $usuario->definirRol($fila["id_roles"]);
            $usuario->definirEmail($fila["email"]);
            $usuario->definirMovil($fila["movil"]);
            $usuario->definirNombre($fila["nombre"]);
            $usuario->definirApellidos($fila["apellidos"]);
            $usuario->definirImagen($fila["imagen"]);
            array_push($usuarios, $usuario);
        }
        return $usuarios;
    }

    /**
     * Método para obtener apellidos
     * Si apellidos es nulo se lanza una nueva excepción
     * si no, se retorna apellidos.
     */
    public function obtenerApellidos()
    {
        if (is_null($this->apellidos)) {
            throw new Exception("Los apellidos no están definidos");
        } else {
            return $this->apellidos;
        }
    }

    /**
     * Método para obtener la contraseña
     * Si la contraseña  es nulo se lanza una nueva excepción
     * si no, se retorna la contraseña.
     */
    public function obtenerContrasena()
    {
        if (is_null($this->contrasena)) {
            throw new Exception("La contraseña no está definida.");
        } else {
            return $this->contrasena;
        }
    }

    /**
     * Método para obtener el email
     * Si el email es nulo se lanza una nueva excepción
     * si no, se retorna el email.
     */
    public function obtenerEmail()
    {
        if (is_null($this->email)) {
            throw new Exception("El correo electrónico no está definido.");
        } else {
            return $this->email;
        }
    }

    /**
     * Método para obtener el id
     * Si el id es nulo se lanza una nueva excepción
     * si no, se retorna el id.
     */
    public function obtenerId()
    {
        if (is_null($this->id)) {
            throw new Exception("El identificador del usuario no está definido.");
        } else {
            return $this->id;
        }
    }

    /**
     * Método para obtener el imagen
     * Si el imagen es nulo se lanza una nueva excepción
     * si no, se retorna el imagen.
     */
    public function obtenerImagen()
    {
        if (is_null($this->imagen)) {
            throw new Exception("Ruta de la imagen no definida");
        } else {
            return $this->imagen;
        }
    }

    /**
     * Método para obtener el móvil
     */
    public function obtenerMovil()
    {
        if (is_null($this->id)) {
            throw new Exception("El número de móvil no esta definido.");
        } else {
            return $this->movil;
        }
    }

    /**
     * Método para obtener el nombre
     * Si el nombre es nulo se lanza una nueva excepción
     * si no, se retorna el nombre.
     */
    public function obtenerNombre()
    {
        if (is_null($this->nombre)) {
            throw new Exception("El nombre no esta definido");
        } else {
            return $this->nombre;
        }
    }

    /**
     * Método para obtener el rol
     * Si el rol es nulo se lanza una nueva excepción
     * si no, se retorna el rol.
     */
    public function obtenerRol()
    {
        if (is_null($this->rol)) {
            throw new Exception("El rol no está definido");
        } else {
            $rol = new Rol();
            return $rol->listarPorId($this->rol);
        }
    }
}
