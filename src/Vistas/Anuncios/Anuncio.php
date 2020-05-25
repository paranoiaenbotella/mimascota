<!--Ver anuncio-->
<section class="container">
  <div class="row">
    <div class="col-sm-12  col-md-12 col-lg-12">
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
          <!--DESCRIPCIÓN CUIDADOR-->
          <div class="row">
            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <p class="my-2"></p>

            </div>
          </div>
          <!--SERVICIOS-->
          <div class="row">
            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <h5>Servicios:</h5>
            
            </div>
          </div>
          <!--TIPOS ANIMALES-->
          <div class="row">
            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <h5>Tipos: </h5>           
            </div>
          </div>
          <!--CONTACTO-->
          <div class="row">
            <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <h5>Información de contacto: </h5>           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>