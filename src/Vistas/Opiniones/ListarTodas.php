<!--Tabla con todas las opiniones-->
<section class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
      <h6 class="mb-1 mt-3"> Opiniones:</h6>
      <?php if ($datos["opiniones"]):?>
      <table class="table table-sm table-hover border border-success">
        <thead>
          <tr class="bg-success text-white">
            <th>Mensaje</th>
            
            <th colspan="3">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($datos["opiniones"] as $opinion): ?>
          <tr>
           <td class="text-break"><?php printf("%s...", substr($opinion->obtenerMensaje(),0,256)); ?></td>
            <td>
              <a href="/opiniones/todas/eliminar/<?php echo($opinion->obtenerId(
                )); ?>" class="btn btn-sm btn-danger">Eliminar
              </a>
            </td>
          <td>
              <a href="/ver-anuncios/<?php echo($opinion->obtenerAnuncio()); ?>" class="btn btn-sm btn-primary">Ver Anuncio</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
       <?php else: ?>
       <p>No hay opiniones definidas.</p>
        <?php endif; ?>
    </div>
  </div>
</section>