<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <title>MiMascota</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <section class="container">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
                    <h4>Formulario de Registro</h4>
                    <!--FORMULARIO REGISTRO-->
                    <form method="post" novalidate>
                        <!---->
                        <!-- NOMBRE-->
                        <div class="form-group my-0">
                            <label for="nombre" class="mb-0">Nombre:</label>
                            <!-- Comprobar si el campo ha sido rellenado previamente-->
                            <?php if (Sesion::existeFormulario("nombre")): ?>
                                <!-- Comprobar si hay error con el valor introducido-->
                                <?php if (Sesion::existeError("nombre")): ?>
                                    <!-- Mostrar el valor introducido -->
                                    <input class="form-control form-control-sm is-invalid" id="nombre" name="nombre" type="text" value="<?php echo(Sesion::obtenerFormulario("nombre")); ?>">
                                    <div class="invalid-feedback">
                                        <!-- Si hay error se muestra mensaje-->
                                        <?php echo(Sesion::obtenerError("nombre")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm is-valid" id="nombre" name="nombre" type="text" value="<?php echo(Sesion::obtenerFormulario("nombre")); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if (Sesion::existeError("nombre")): ?>
                                    <input class="form-control form-control-sm is-invalid" id="nombre" name="nombre" type="text">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("nombre")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm" id="nombre" name="nombre" type="text">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                         <!-- APELLIDOS -->
                        <div class="form-group my-0">
                            <label for="apellidos" class="mb-0">Apellidos:</label>
                            <?php if (Sesion::existeFormulario("apellidos")): ?>
                                <?php if (Sesion::existeError("apellidos")): ?>
                                    <input class="form-control form-control-sm is-invalid" id="apellidos" name="apellidos" type="text" value="<?php echo(Sesion::obtenerFormulario("apellidos")); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("apellidos")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm is-valid" id="apellidos" name="apellidos" type="text" value="<?php echo(Sesion::obtenerFormulario("apellidos")); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if (Sesion::existeError("apellidos")): ?>
                                    <input class="form-control form-control-sm is-invalid" id="apellidos" name="apellidos" type="text">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("apellidos")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm" id="apellidos" name="apellidos" type="text">
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php if (Sesion::existeError("apellidos")): ?>
                            <div>
                                <p><?php echo(Sesion::obtenerError("apellidos")); ?></p>
                            </div>
                        <?php endif; ?>
                         <!-- EMAIL -->
                        <div class="form-group my-0">
                            <label for="email" class="mb-0">Correo Electrónico:</label>
                            <?php if (Sesion::existeFormulario("email")): ?>
                                <?php if (Sesion::existeError("email")): ?>
                                    <input aria-describedby="emailInfo" class="form-control form-control-sm is-invalid" id="email" name="email" type="email" value="<?php echo(Sesion::obtenerFormulario("email")); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("email")); ?>
                                    </div>
                                <?php else: ?>
                                    <input aria-describedby="emailInfo" class="form-control form-control-sm is-valid" id="email" name="email" type="email" value="<?php echo(Sesion::obtenerFormulario("email")); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if (Sesion::existeError("email")): ?>
                                    <input aria-describedby="emailInfo" class="form-control form-control-sm is-invalid" id="email" name="email" type="email">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("email")); ?>
                                    </div>
                                <?php else: ?>
                                    <input aria-describedby="emailInfo" class="form-control form-control-sm" id="email" name="email" type="email">
                                <?php endif; ?>
                            <?php endif; ?>
                            <small id="emailInfo" class="form-text text-muted">Nunca se compartirá tu email con alguien.</small>
                        </div>
                         <!-- MÓVIL -->
                        <div class="form-group my-0">
                         <label for="movil" class="mb-0">Móvil:</label>
                         <?php if (Sesion::existeFormulario("movil")): ?>
                                <?php if (Sesion::existeError("movil")): ?>
                                    <input class="form-control form-control-sm is-invalid" id="movil" name="movil" type="text" value="<?php echo(Sesion::obtenerFormulario("movil")); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("movil")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm is-valid" id="movil" name="movil" type="text" value="<?php echo(Sesion::obtenerFormulario("movil")); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if (Sesion::existeError("movil")): ?>
                                    <input class="form-control form-control-sm is-invalid" id="movil" name="movil" type="text">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("movil")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm" id="movil" name="movil" type="text">
                                <?php endif; ?>
                            <?php endif; ?>
                        
                        <?php if (Sesion::existeError("movil")): ?>
                            <div>
                                <p><?php echo(Sesion::obtenerError("movil")); ?></p>
                            </div>
                        <?php endif; ?>
                         </div>
                         <!-- CONTRASEÑA -->
                        <div class="form-group my-0">
                         <label for="contrasena" class="mb-0">Contraseña:</label>
                         <?php if (Sesion::existeFormulario("contrasenaCorta")): ?>
                                <?php if (Sesion::existeError("contrasenaCorta")): ?>
                                    <input aria-describedby="contrasenaInfo" class="form-control form-control-sm is-invalid" id="contrasena" name="contrasena" type="password" value="<?php echo(Sesion::obtenerFormulario("contrasenaCorta")); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("contrasenaCorta")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm is-valid" id="contrasena" name="contrasena" type="password" value="<?php echo(Sesion::obtenerFormulario("contrasenaCorta")); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if (Sesion::existeError("contrasenaCorta")): ?>
                                    <input class="form-control form-control-sm is-invalid" id="contrasena" name="contrasena" type="password">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("contrasenaCorta")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm" id="contrasena" name="contrasena" type="password">
                                <?php endif; ?>
                            <?php endif; ?>
                        
                        <?php if (Sesion::existeError("contrasenaCorta")): ?>
                            <div>
                                <p><?php echo(Sesion::obtenerError("contrasenaCorta")); ?></p>
                            </div>
                        <?php endif; ?>
                        <small id="contrasenaInfo" class="form-text text-muted">Longitud en caracteres: Mínima 8,  Máxima 64.</small>
                         </div>
                         <!-- VERIFICAR CONTRASEÑA -->
                         <div class="form-group my-0">
                         <label for="contrasena-verificada" class="mb-0">Verificar Contraseña:</label>
                         <?php if (Sesion::existeFormulario("contrasenaVerificada")): ?>
                                <?php if (Sesion::existeError("contrasenaVerificada")): ?>
                                    <input class="form-control form-control-sm is-invalid" id="contrasena-verificada" name="contrasena-verificada" type="password" value="<?php echo(Sesion::obtenerFormulario("contrasenaVerificada")); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("contrasenaVerificada")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm is-valid" id="contrasena-verificada" name="contrasena-verificada" type="password" value="<?php echo(Sesion::obtenerFormulario("contrasenaVerificada")); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if (Sesion::existeError("contrasenaVerificada")): ?>
                                    <input class="form-control form-control-sm is-invalid" id="contrasena-verificada" name="contrasena-verificada" type="password">
                                    <div class="invalid-feedback">
                                        <?php echo(Sesion::obtenerError("contrasenaVerificada")); ?>
                                    </div>
                                <?php else: ?>
                                    <input class="form-control form-control-sm" id="contrasena-verificada" name="contrasena-verificada" type="password">
                                <?php endif; ?>
                            <?php endif; ?>
                        
                        <?php if (Sesion::existeError("contrasenaVerificada")): ?>
                            <div>
                                <p><?php echo(Sesion::obtenerError("contrasenaVerificada")); ?></p>
                            </div>
                        <?php endif; ?>
                        </div>
                         <!-- ROL -->
                        <div class="form-group my-0">
                            <label for="rol" class="mb-0">Rol:</label>
                            <select class="form-control form-control-sm" name="rol" id="rol">
                                <?php foreach ($roles as $rol): ?>
                                    <option value="<?php echo($rol->obtenerId()); ?>">
                                        <?php echo($rol->obtenerNombre()); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <input type="submit" class="btn btn-block btn-success" value="Registrarse">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>