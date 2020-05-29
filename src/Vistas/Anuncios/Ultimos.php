<!--Tabla con los ultimos 10 anuncios-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-1 mt-3"> Últimos 10 anuncios publicados:</h6>
            <?php if ($datos["anuncios"]):?>
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Descripción</th>
                        <th>Fecha Creación</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                  <?php foreach ($datos["anuncios"] as $anuncio): ?>  
                    <tr>
                        <td><?php echo $anuncio->obtenerId(); ?></td>
                        <td><?php echo $anuncio->obtenerUsuario(); ?></td>
                        <td><?php printf("%s...", substr($anuncio->obtenerDescripcion(),0,128)); ?></td>
                        <td><?php echo $anuncio->obtenerFecha(); ?></td>

                        <td>
                            <a href="/anuncios/eliminar/<?php echo($anuncio->obtenerId(
                )); ?>" class="btn btn-sm btn-danger">Eliminar
                            </a>
                        </td>
                    </tr>
                  <?php endforeach; ?>  
                </tbody>                             
            </table>
            <?php else: ?>
       <p>No hay anuncios definidos.</p>
        <?php endif; ?>
        </div>
    </div>
</section>