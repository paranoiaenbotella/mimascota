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
        <section class="container">
            <div class="row">
                <div class ="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <h3>Formulario de Registro</h3>
                    <form method="POST" novalidate>
                        <div class="form-group my-1">
                            <label for="nombre" class="mb-0">Nombre:</label>
                            <?php if (Sesion::existeError("nombre")): ?>
                             <input class="form-control form-control-sm is-invalid" id="nombre" name="nombre" type="text">
                                <div class="invalid-feedback">
                                    <?php echo(Sesion::obtenerError("nombre")); ?>
                                </div>
                            <?php else: ?>
                            <input class="form-control form-control-sm" id="nombre" name="nombre" type="text">
                            <?php endif; ?>
                        </div>
                        </div>
                        <?php endif; ?>
                        <div class="form-group my-1">
                            <label for="appellidos" class="mb-0">Apellidos:</label>
                            <?php if (Sesion::existeError("apellidos")): ?>
                                <input class="form-control form-control-sm is-invalid" id="appellidos" name="apellidos" type="text">
                                <div class="invalid-feedback">
                                    <?php echo(Sesion::obtenerError("apellidos")); ?>
                                </div>
                            <?php else: ?>
                            <input class="form-control form-control-sm" id="appellidos" name="apellidos" type="text">
                            <?php endif; ?>
                        </div>
                        <div class="form-group my-1">
                            <label for="email" class=" mb-0">Correo Electrónico:</label>
                            <?php if (Sesion::existeError("email")): ?>
                                <input class="form-control form-control-sm is-invalid" id="email" name="email" type="email">
                                <div class="invalid-feedback">
                                    <?php echo(Sesion::obtenerError("email")); ?>
                                </div>
                            <?php else: ?>  
                            <input class="form-control form-control-sm" id="email" name="email" type="email" aria-describedby="emailInfo">
                            <small id="emailInfo" class="text-muted">Nunca se compartirá tu email con alguien.</small>
                            <?php endif; ?>
                        </div>
    
                        <div class="form-group my-1">
                            <label for="movil" class="mb-0"> Móvil:</label>
                            <?php if (Sesion::existeError("movil")): ?>
                                <input class="form-control form-control-sm is-invalid" id="movil" name="movil" type="text">
                                <div class="invalid-feedback">
                                    <?php echo(Sesion::obtenerError("movil")); ?>
                                    </div>
                            <?php else: ?>
                            <input class="form-control form-control-sm" id="movil" name="movil" type="text">
                            <?php endif; ?>
                        </div>
                        <div class="form-group my-1">
                            <label for="contrasena" class="mb-0">Contraseña:</label>
                             <?php if (Sesion::existeError("contrasena")): ?>
                                <input class="form-control form-control-sm is-invalid" id="contrasena" name="contrasena" type="password">
                                <div class="invalid-feedback">
                                    <?php echo(Sesion::obtenerError("contrasena")); ?>
                                    </div>
                            <?php else: ?>
                            <input class="form-control form-control-sm" id="contrasena" name="contrasena" type="password" aria-describedby="contraseñaInfo">
                            <small id="contraseñaInfo" class=" text-muted">Longitud: entre 8 y 64 caracteres ambos inclusive.</small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group my-1">
                            <label for="contrasena-verificada" class="form-text mb-0">Verificar Contraseña:</label>
                            <?php if (Sesion::existeError("contrasenaVerificada")): ?>
                                <input class="form-control form-control-sm is-invalid" id="contrasena-verificada" name="contrasena-verificada" type="password">
                                <div class="invalid-feedback">
                                    <?php echo(Sesion::obtenerError("contrasenaVerificada")); ?>
                                    </div>
                            <?php else: ?>
                            <input class="form-control form-control-sm" id="contrasena-verificada" name="contrasena-verificada" type="password">
                            <?php else: ?>
                        </div>
                        <div class="form-group my-1">
                            <label for="rol" class="form-text mb-0">Rol:</label>
                            <select class="form-control form-control-sm" name="rol" id="rol">
                                <?php
                                foreach ($roles as $rol): ?>
                                <option value="<?php
                                    echo($rol->obtenerId()); ?>"><?php
                                echo($rol->obtenerNombre()); ?></option>
                                <?php
                                endforeach; ?>
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