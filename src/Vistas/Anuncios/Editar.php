<!--Crear anuncio-->
<section class="container">
  <div class="row">
    <div class="col-sm-12  col-md-12 col-lg-12">
      <div class="card mb-5 p-4">
        <div class="card-header">
          <h4>Editar anuncio</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-10 offset-sm-1 col-md-10 offset-md-1  col-lg-10 offset-lg-1">
              <!--SLIDER-->
              <div id="carrousel" class="carousel slide mb-5" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?php echo($datos["anuncio"]->obtenerImagen1(
                    )); ?>" class="d-block w-100" alt="<?php echo($datos["anuncio"]->obtenerImagen1(
                    )); ?>">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo($datos["anuncio"]->obtenerImagen2(
                    )); ?>" class="d-block w-100" alt="<?php echo($datos["anuncio"]->obtenerImagen2(
                    )); ?>">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo($datos["anuncio"]->obtenerImagen3(
                    )); ?>" class="d-block w-100" alt="<?php echo($datos["anuncio"]->obtenerImagen3(
                    )); ?>">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo($datos["anuncio"]->obtenerImagen4(
                    )); ?>" class="d-block w-100" alt="<?php echo($datos["anuncio"]->obtenerImagen4(
                    )); ?>">
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
        </div>
        <!--FORM-->
        <form class = "row" enctype="multipart/form-data" method="post">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <!--DESCRIPCIÓN CUIDADOR-->
            <div class="form-group my-0 ">
              <label for="descripcion" class="mb-0">Sobre el cuidador y alojamiento:</label>
              <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="13"><?php echo($datos["anuncio"]->obtenerDescripcion(
              )); ?></textarea>
              <?php if (Sesion::existeError("descripcionAnuncio")): ?>
              <div>
                <p class="error"><?php echo(Sesion::obtenerError(
                  "descripcionAnuncio"
                )); ?></p>
              </div>
              <?php endif; ?>
            </div>
           
          </div>
          <!--IMAGENES-->
          <div class="col-sm-6 col-md-6 col-lg-6">
            <h6 class="my-1"> Imágenes que se mostraran en el anuncio: </h6>
            <!--PRIMERA IMAGEN CARROUSEL-->
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text mb-2" id="imagen1">Imagen 1:</span>
              </div>
              <input type="file" class="form-control" name="imagen1" aria-label="Imagen 1" aria-describedby="file">
            </div>
            <!--SEGUNDA IMAGEN CARROUSEL-->
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text mb-2" id="imagen2">Imagen 2:</span>
              </div>
              <input type="file" class="form-control" name="imagen2" aria-label="Imagen 2" aria-describedby="file">
            </div>
            <!--TERCERA IMAGEN CARROUSEL-->
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text mb-2" id="imagen3">Imagen 3:</span>
              </div>
              <input type="file" class="form-control" name="imagen3" aria-label="Imagen 3" aria-describedby="file">
            </div>
            <!--CUARTA IMAGEN CARROUSEL-->
           <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text mb-4" id="imagen4">Imagen 4:</span>
              </div>
              <input type="file" class="form-control" name="imagen4" aria-label="Imagen 4" aria-describedby="file">
            </div>
             <div class="row">
              <!--TIPOS ANIMALES-->
              <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="form-group my-0">
                  <label for="animal-tipos" class="mb-0">Tipos de Animales:</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <!--SERVICIOS-->
                <div class="form-group my-0">
                  <label for="servicio" class="mb-0">Servicios:</label>
                  <select class="form-control form-control-sm" multiple name="servicio" id="servicio">
                    <?php foreach ($datos["servicios"] as $servicio): ?>
                    <?php foreach ($datos["anuncio"]->obtenerIdServicios(
                    ) as $anuncioServicio): ?>
                    <?php if ($anuncioServicio->obtenerId() === $servicio->obtenerId()): ?>
                    <option selected value="<?php echo($servicio->obtenerId(
                    )); ?>"><?php echo($servicio->obtenerNombre()); ?></option>
                    <?php else: ?>
                    <option value="<?php echo($servicio->obtenerId(
                    )); ?>"><?php echo($servicio->obtenerNombre()); ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          <!--GUARDAR-->
            <div class="input-group my-2">
              <button class="btn btn-success" type="submit">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>