<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <title>MiMascota</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">MiMascota</a>
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if (Sesion::esInvitado()): ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/cuidadores">Ver Cuidadores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registro">Registro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/identificacion">Identificaci&oacute;n</a>
                            </li>
                        </ul>
                    <?php elseif (Sesion::esCuidador()): ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/direcciones">Direcciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/servicios">Servicios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/anuncios">Anuncios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/perfil">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/salir">Salir</a>
                            </li>
                        </ul>

                      <?php elseif (Sesion::esPropietario()): ?>
                           <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/opiniones">Opiniones</a>
                            </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="/animales">Animales</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="/perfil">Perfil</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="/salir">Salir</a>
                               </li>
                           </ul>
                    <?php else: ?>
                            <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/usuarios">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/animales/tipos">Tipos de animales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/roles">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/anuncios/ultimos">Ultimos anuncios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/perfil">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/salir">Salir</a>
                            </li>
                        </ul>
                     <?php endif; ?>
                </div>
            </div>
        </nav>
        <?php require_once(sprintf("%s/%s", $this->obtenerDirectorioVistas(), $vista)); ?>
        <script crossorigin="anonymous" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script crossorigin="anonymous" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script crossorigin="anonymous" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
