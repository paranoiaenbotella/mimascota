<!--Ver anuncio-->
<section class="container">
    <div class="row">
        <div class="col-sm-12  col-md-12 col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4> <?php echo($datos["anuncio"]->obtenernombre()); ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1  col-lg-10 offset-lg-1">
                            <!--SLIDER-->
                            <div id="carrousel" class="carousel slide mb-5" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="<?php echo($datos["anuncio"]->obtenerImagen1(
                                        )); ?>" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo($datos["anuncio"]->obtenerImagen2(
                                        )); ?>" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo($datos["anuncio"]->obtenerImagen3(
                                        )); ?>" class="d-block w-100" alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="<?php echo($datos["anuncio"]->obtenerImagen4(
                                        )); ?>" class="d-block w-100" alt="">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carrousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carrousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--DESCRIPCIÓN CUIDADOR-->
                    <?php
                    $usuario = new Usuario();
                    $usuario = $usuario->listarPorId($datos["anuncio"]->obtenerUsuario()); ?>
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                            <h4> Sobre <?php echo($usuario->obtenerNombre()); ?></h4>
                            <p class="text-justify"> <?php echo($datos["anuncio"]->obtenerDescripcion()); ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <?php
                    $animalesTipos = [];
                    foreach ($datos["anuncio"]->obtenerIdAnimalesTipos() as $animalTipo) {
                        array_push($animalesTipos, $animalTipo->obtenerNombre());
                    }
                    $servicios = [];
                    foreach ($datos["anuncio"]->obtenerIdServicios() as $servicio) {
                        array_push($servicios, $servicio);
                    }
                    ?>
                    <!--SERVICIOS-->
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1 mb-3">
                            <h4 class="text-success">Servicios y precios:</h4>
                            <?php foreach ($servicios as $servicio): ?>
                                <div class="clearfix bg-light border-top border-bottom">
                                    <p class="float-left pl-3">
                                        <strong><?php echo($servicio->obtenerNombre()) ?></strong>
                                        <br>
                                        <small><?php echo($servicio->obtenerDescripcion()); ?></small>
                                    </p>
                                    <p class="float-right pr-3 font-weight-bold"><?php echo($servicio->obtenerPrecio(
                                        )) ?>&euro;
                                    </p>
                                </div>
                            <?php endforeach; ?>
                            <em>Tipos de animales: <?php echo(implode(", ", $animalesTipos)); ?></em>
                        </div>
                    </div>
                    <hr>
                    <!--CONTACTO-->
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1 mb-3">
                            <h4 class="text-success">Información de contacto:</h4>
                            <p class="mb-0">Móvil: <?php echo($usuario->obtenerMovil()); ?></p>
                            <p class="mb-3">Correo Electrónico: <?php echo($usuario->obtenerEmail()); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--PAGINA CON OPINIONES-->
<section class="container">
    <div class="row">
        <div class="col-sm-12  col-md-12 col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4> Opiniones de los propietarios:</h4>
                </div>
                <div class="card-body">
                    <?php $mostarFormulario = true;
                    if ($datos["opiniones"]): ?>
                        <?php foreach ($datos["opiniones"] as $opinion): ?>
                            <?php if (!Sesion::esInvitado() && $opinion->obtenerUsuario() === Sesion::obtenerUsuario()
                                    ->obtenerId()): ?>
                                <p>Ya ha dejado una opinion.</p>
                                <?php $mostarFormulario = false; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if ($mostarFormulario && !Sesion::esInvitado()): ?>
                        <div class="row">
                            <div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                                <form action="/opiniones/crear" method="post">
                                    <input name="anuncio-id" type="hidden" value="<?php echo($datos["anuncio"]->obtenerId(
                                    )); ?>">
                                    <div class="form-group my-0">
                                        <label for="mensaje" class="mb-0">Escribe tu opinión sobre el servicio recibido:</label>
                                        <textarea class="form-control form-control-sm" id="mensaje" name="mensaje" rows="8"></textarea>
                                    </div>
                                    <div class="form-group my-2">
                                        <input class="btn btn-block btn-success" type="submit" value="Guardar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!--OPINIÓN-->
                    <?php if ($datos["opiniones"]): ?>
                        <?php foreach ($datos["opiniones"] as $opinion): ?>
                            <div class="row">
                                <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1  col-lg-10 offset-lg-1">
                                    <?php
                                    $propietario = new Usuario();
                                    $propietario = $propietario->listarPorId($opinion->obtenerUsuario());
                                    ?>
                                    <div class="media bg-light mb-3 border-bottom">
                                        <img src="<?php echo($propietario->obtenerImagen(
                                        )); ?>" class="align-self-start mr-3 rounded img-thumbnail" alt="imagen de perfil">
                                        <div class="media-body">
                                            <h5 class="mt-0"><?php printf(
                                                    "%s %s dice:",
                                                    $propietario->obtenerNombre(),
                                                    $propietario->obtenerApellidos()
                                                ); ?></h5>
                                            <p class="font-italic"><?php echo($opinion->obtenerMensaje()); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1  col-lg-10 offset-lg-1">
                                <p>No hay opiniones sobre este anuncio.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
