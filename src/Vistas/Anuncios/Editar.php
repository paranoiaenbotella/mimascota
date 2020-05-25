<!--Crear anuncio-->
<section class="container">
  <div class="row">
    <div class="col-sm-12  col-md-12 col-lg-12  ">
      <div class="card ">
        <div class="card-header">
          <h4>Editar anuncio</h4>
        </div>
        <div class="card-body">
         <div class="row"> 
          <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1  col-lg-10 offset-lg-1">
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
          <div class="row">
            <div class="col-sm-5 offset-sm-1  col-md-5 offset-md-1 col-lg-5 offset-lg-1">
          <!--DESCRIPCIÓN CUIDADOR-->
          <form enctype="multipart/form-data" method="post">
            <div class="form-group my-0">
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
            <div class="col-sm-5  col-md-5 col-lg-5">
              <div class="form-group my-0">
                <label for="servicio" class="mb-0">Servicios:</label>
                <select class="form-control form-control-sm" name="servicio" id="servicio">
                  <option>Seleccione un Servicio</option>
                  <?php foreach ($datos["servicios"] as $servicio): ?>
                  <?php if ($datos["anuncio"]->obtenerServicio() === $servicio->obtenerId()): ?>
                  <option selected value="<?php echo($servicio->obtenerId()); ?>">
                    <?php echo($servicio->obtenerNombre()); ?>
                  </option>
                  <?php else: ?>
                  <option value="<?php echo($servicio->obtenerId()); ?>">
                    <?php echo($servicio->obtenerNombre()); ?>
                  </option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <!--PRIMERA IMAGEN CAROUSEL-->
              <div class="form-group mb-2">
                <label for="imagen1" class="mb-0"> Imagen1:</label>
                <input type="file" class="form-control" name="imagen1">
              </div>
              <!--SEGUNDA IMAGEN CAROUSEL-->
              <div class="form-group mb-2">
                <label for="imagen2" class="mb-0"> Imagen 2:</label>
                <input type="file" class="form-control" name="imagen2">
              </div>
              <!--TERCERA IMAGEN CAROUSEL-->
              <div class="form-group mb-2">
                <label for="imagen3" class="mb-0"> Imagen 3:</label>
                <input type="file" class="form-control" name="imagen3">
              </div>
              <!--CUARTA IMAGEN CAROUSEL-->
              <div class="form-group mb-2">
                <label for="imagen4" class="mb-0"> Imagen 4:</label>
                <input type="file" class="form-control" name="imagen4">
              </div>
              <div class="input-group my-2">
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