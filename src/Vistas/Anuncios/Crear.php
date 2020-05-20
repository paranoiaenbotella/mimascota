<!--Crear anuncio-->
<section class="container">
    <div class="row">
        <div class="col-sm-12  col-md-12 col-lg-12  ">
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
                            
                      <!--DESCRIPCIÓN CUIDADOR--> 
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
                      
                       
                        <div class="col-sm-7  col-md-7 col-lg-7">
                    <h5>Crear servicios </h5>
                    <div class="form-group my-0">
                    <label for="nombre" class="mb-0">Nombre servicio:</label>
                    <input class="form-control form-control-sm" id="nombre" name="nombre" type="text" placeholder="Ej. Alojamiento de noche">
                    <?php if (Sesion::existeError("nombreServicio")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("nombreServicio")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <!--DESCRIPCIÓN-->

                <div class="form-group my-0">
                    <label for="descripcion" class="mb-0">Descripcion del servicio:</label>
                    <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="3" placeholder="Ej. desde las 19 las 9. Aquí se puede incluir otras prestaciones se se desea... "></textarea>
                    <?php if (Sesion::existeError("descripcionServicio")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("descripcionServicio")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                 <!--PRECIO-->
                <div class="form-group my-0">
                    <label for="precio" class="mb-0">Precio del servicio:</label>
                    <input class="form-control form-control-sm" id="precio" name="precio" type="text">
                    <?php if (Sesion::existeError("precio")): ?>
                        <div>
                            <p class="error"><?php echo(Sesion::obtenerError("precio")); ?></p>
                        </div>
                    <?php elseif (Sesion::existeAcierto("succes")): ?>
                        <div>
                            <p class="succes"><?php echo(Sesion::obtenerAcierto("succes")); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <!--IMAGENES-->
                <div class="form-group mb-2">
                <label for="imagen" class="mb-0"> Imagen:</label>
                <input type="file" class="form-control " name="imagen">
                </div>
                                
                                <div class="input-group mb-2">
                                    <button class="btn btn-secondary" type="submit">Guardar</button>
                                </div>
                        </div>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>