<!--Mostrar información de perfil-->
<section class="container">
    <div class="row">
        <div class="col-sm-12  col-md-10 offset-md-1 col-lg-10 offset-lg-1 ">
            <div class="card ">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Direcciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1">Anuncios</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3  col-md-3 col-lg-3">
                            <div class="card" style="width: 7rem;">
                                <img src="..." class="rounded float-left" alt="imagen de perfil">
                                <h6>Avatar</h6>
                            </div>
                        </div>
                        <!--NOMBRE-->
                        <div class="col-sm-9  col-md-9 col-lg-9">
                            <form method="post">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="nombre">Nombre:</span>
                                    </div>
                                    <input type="text" class="form-control" name="nombre" aria-label="Nombre" aria-describedby="nombre" value="<?php echo($datos["usuario"]->obtenerNombre()); ?>">
                                </div>
                                <!--APELLIDOS-->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="apellidos">Apellidos:</span>
                                    </div>
                                    <input type="text" class="form-control" name="apellidos" aria-label="Apellidos" aria-describedby="apellidos" value="<?php echo($datos["usuario"]->obtenerApellidos()); ?>">
                                </div>
                                <!--MOVIL-->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="movil">Móvil:</span>
                                    </div>
                                    <input type="text" class="form-control" name="movil" aria-label="Móvil" aria-describedby="movil" value="<?php echo($datos["usuario"]->obtenerMovil()); ?>">
                                </div>
                                <!--CORREO ELECTRONICO-->
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="email">Email:</span>
                                    </div>
                                    <input type="text" class="form-control" name="email" aria-label="Email" aria-describedby="email" value="<?php echo($datos["usuario"]->obtenerEmail()); ?>">
                                </div>
                                <div class="input-group mb-2">
                                    <button class="btn btn-secondary" type="submit">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
