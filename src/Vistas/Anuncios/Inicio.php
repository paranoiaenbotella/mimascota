<!--Ver cuidadores-->
<section class="container">
  <div class="row">
    <div class="col-sm-12  col-md-12 col-lg-12 my-3">
      <h1 id="anuncios">Encuentra el mejor cuidador para tu mascota</h1>

  <?php if (count($datos["anuncios"]) > 0): ?>
  <?php foreach ($datos["anuncios"] as $anuncio): ?>
  <div class="row">
    <div class="col-sm-10 offset-sm-1  col-md-10 offset-md-1  col-lg-10 offset-lg-1 my-4">
       <div id ="resumen">
        <a href="<?php printf("/ver-anuncios/%d", $anuncio->obtenerId()); ?>">
          <div class="media bg-light mb-3 border p-2">
            <?php
            $animalesTipos = [];
            foreach ($anuncio->obtenerIdAnimalesTipos() as $animalTipo) {
            array_push($animalesTipos, $animalTipo->obtenerNombre());
            }
            $usuario = new Usuario();
            $usuario = $usuario->listarPorId($anuncio->obtenerUsuario());
            ?>
            <div class="row">
              <div class="col-sm-2  col-md-2 col-lg-2 ">
            <img src="<?php echo($usuario->obtenerImagen(
            )); ?>" class="align-self-start mr-3 img-thumbnail" alt="imagen de perfil">
          </div>
          <div class="col-sm-10  col-md-10 col-lg-10">
            <div class="media-body">
              <h5 class="mt-0"><?php printf(
              "%s %s",
              $usuario->obtenerNombre(),
              $usuario->obtenerApellidos()
              ); ?></h5>
              <p class="m-0"><?php echo($anuncio->obtenerNombre()); ?></p>
              <p class="font-italic mb-0"><?php printf(
                "Fecha de creación: %s",
                $anuncio->obtenerFecha()); ?></p>
              <p class="font-italic mb-0"><?php echo(implode(", ", $animalesTipos)); ?></p>
              <p class="mb-0"><?php printf("%s...",substr($anuncio->obtenerDescripcion(), 0, 128)); ?></p>
              </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  </div>
  </div>
  <?php endforeach; ?>
  <?php else: ?>
  <p>No hay anuncios publicados.</p>
  <?php endif; ?>
</section>