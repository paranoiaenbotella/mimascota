<!--Ver anuncio-->
<section class="container">
  <div class="row">
    <div class="col-sm-12  col-md-12 col-lg-12">
      <div class="card ">
        <div class="card-header">
          <h4> <?php echo ($datos["anuncio"]->obtenernombre());?></h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1  col-lg-10 offset-lg-1">
              <!--SLIDER-->
              <div id="carrousel" class="carousel slide mb-5" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?php echo ($datos["anuncio"]->obtenerImagen1());?>" class="d-block w-100" alt="">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo ($datos["anuncio"]->obtenerImagen2());?>" class="d-block w-100" alt="">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo ($datos["anuncio"]->obtenerImagen3());?>" class="d-block w-100" alt="">
                  </div>
                  <div class="carousel-item">
                    <img src="<?php echo ($datos["anuncio"]->obtenerImagen4());?>" class="d-block w-100" alt="">
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
          $usuario = $usuario->listarPorId($datos["anuncio"]->obtenerUsuario());?>
          
          <div class="row">
            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1">
              <h4> Sobre <?php echo ($usuario->obtenerNombre()); ?></h4>
              <p class="text-justify"> <?php echo ($datos["anuncio"]->obtenerDescripcion());?>
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
              <?php foreach ($servicios as $servicio):?>
              <div class="clearfix bg-light border-top border-bottom">       
                <p class="float-left pl-3"><strong><?php echo($servicio->obtenerNombre()) ?></strong><br>
                  <small><?php echo($servicio->obtenerDescripcion()); ?></small> </p>
                <p class="float-right pr-3 font-weight-bold"><?php echo($servicio->obtenerPrecio()) ?>&euro;</p>    
              </div>
              <?php endforeach; ?>
              <em>Tipos de animales: <?php echo(implode(", ", $animalesTipos)); ?></em>
            </div>
          </div>
          <hr>
          <!--CONTACTO-->
          <div class="row">
            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1 mb-3">
              <h4 class="text-success">Información de contacto: </h4>
              <p class="mb-0">Móvil: <?php echo ($usuario->obtenerMovil()); ?></p>
              <p class="mb-3">Correo Electrónico: <?php echo ($usuario->obtenerEmail()); ?></p>
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
          <!--OPINIÓN-->
          <div class="row">
            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1  col-lg-10 offset-lg-1">
              <div class="media bg-light mb-3 border-bottom">
                <img src ="" class="align-self-start mr-3 rounded img-thumbnail" alt="imagen de perfil">
                <div class="media-body">
                  <h5 class="mt-0">(Nombre del propietario) propietario de (nombre animal) dice:</h5>
                  <p class="font-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis egestas fringilla aliquet. Etiam vulputate porttitor quam, et tincidunt risus aliquet ut. Pellentesque sit amet quam ac lacus facilisis aliquet ac ultrices eros. Proin volutpat ultrices turpis. Nunc malesuada volutpat lectus, id tincidunt nisl. Praesent varius est dolor, ut pharetra urna mollis quis. Etiam id vulputate mi. Sed eget libero vitae nulla mollis ullamcorper. Curabitur id tortor mi. Donec quis ultricies arcu. Donec sollicitudin, metus ut cursus vestibulum, mauris neque vestibulum nibh, in egestas orci ipsum at neque. Mauris pellentesque elit eu tortor faucibus vulputate.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--FORMULARIO PARA CREAR OPINIÓN-->
      <div class="row">
        <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1">
          <form method="POST">
            <div class="form-group my-0">
              <label for="mensaje" class="mb-0">Escribe tu opinión sobre el servicio recibido:</label>
              <textarea class="form-control form-control-sm" id="mensaje" name="mensaje" rows="8" ></textarea>
              
            </div>
            <div class="form-group my-2">
              <input class="btn btn-block btn-success" type="submit" value="Guardar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>