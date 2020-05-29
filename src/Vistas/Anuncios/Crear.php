<!--Crear anuncio-->
<section class="container">
  <div class="row">
    <div class="col-sm-12  col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="mb-1">Crear anuncio</h4>
          <p class="text-muted mb-1"> Para poder crear un anuncio se necesita haber creado previamente los servicios oportunos.</p>
        </div>
        <div class="card-body">
          <form class="row" enctype="multipart/form-data" method="post">
            <div class="col-lg-6">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group my-0">
                    <label for="nombre" class="mb-0">Nombre del Anuncio:</label>
                    <input class="form-control form-control-sm" id="nombre" name="nombre" type="text" placeholder="Ej. Cuidador en Zona Sur de Barcelona">
                    <?php if (Sesion::existeError(
                    "descripcionAnuncio"
                    )): // IMPROVE: Change the error detection. ?>
                    <div>
                      <p class="error"><?php echo(Sesion::obtenerError(
                        "descripcionAnuncio"
                      )); ?></p>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <!--DESCRIPCIÓN CUIDADOR-->
                  <div class="form-group my-0">
                    <label for="descripcion" class="mb-0">Sobre el cuidador y alojamiento:</label>
                    <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="4" placeholder="Descripción del cuidador y el entorno donde va a alojar o pasear las mascotas."></textarea>
                    <?php if (Sesion::existeError("descripcionAnuncio")): ?>
                    <div>
                      <p class="error"><?php echo(Sesion::obtenerError(
                        "descripcionAnuncio"
                      )); ?></p>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <!--TIPOS ANIMALES-->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group my-0">
                    <label for="animal-tipos" class="mb-0">Tipos de Animales:</label>
                    <select class="form-control form-control-sm" multiple name="animal-tipos[]" id="animal-tipos">
                      <?php foreach ($datos["animalTipos"] as $animalTipo): ?>
                      <option value="<?php echo($animalTipo->obtenerId()); ?>">
                        <?php echo($animalTipo->obtenerNombre()); ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <!--SERVICIOS-->
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group my-0">
                    <label for="servicios" class="mb-0">Servicios:</label>
                    <select class="form-control form-control-sm" multiple name="servicios[]" id="servicios">
                      <?php foreach ($datos["servicios"] as $servicio): ?>
                      <option value="<?php echo($servicio->obtenerId()); ?>">
                        <?php echo($servicio->obtenerNombre()); ?>
                      </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="row">
                <div class=" col-sm-12 col-md-12 col-lg-12">
          <!--IMAGENES-->
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
                <span class="input-group-text mb-2" id="imagen4">Imagen 4:</span>
              </div>
              <input type="file" class="form-control" name="imagen4" aria-label="Imagen 4" aria-describedby="file">
            </div>
                  <p class="text-muted mb-1"><small>Formatos admitidos: png, jpeg. Para una mejor visualización las imágenes deben tener una altura máxima de 500px.<br> Para poder seleccionar varios valores pulse CTRL + click izquierdo en la opción deseada.</small></p>
                  <div class="input-group my-2">
                    <button class="btn btn-success" type="submit">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>