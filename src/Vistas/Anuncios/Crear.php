<!--Crear anuncio-->
<section class="container">
    <div class="row">
        <div class="col-sm-12  col-md-10 offset-md-1 col-lg-10 offset-lg-1 ">
            <div class="card ">
                <div class="card-header">
                    <h4>Crear anuncio</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5  col-md-5 col-lg-5">
                    <!--SLIDER-->
                            <div id="slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                    <img src="..." class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Siguiente</span>
                                </a>
                            </div>
                      <!--DESCRIPCIÓN--> 
                      <form enctype="multipart/form-data" method="post">   
                            <div class="form-group my-0">
                    <label for="descripcion" class="mb-0">Sobre el cuidador y  alojamiento:</label>
                    <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="13"></textarea>
                    <?php if (Sesion::existeError("descripcionAnuncio")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("descripcionAnuncio")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
                        
                       
                        <div class="col-sm-6  col-md-6 col-lg-6">
                            
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