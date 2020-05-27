<!--Tabla con anuncios-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-1 mt-3"> Anuncios:</h6>
            
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Servicio</th>
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
                        <td><?php echo $anuncio->obtenerServicio(); ?></td>
                        <td><?php echo $anuncio->obtenerDescripcion(); ?></td>
                        <td><?php echo $anuncio->obtenerFecha(); ?></td>
                        <td>
                            <a href="/anuncios/editar/<?php echo($anuncio->obtenerId(
                            )); ?>" class="btn btn-sm btn-info">Editar
                            </a>
                        </td>
                        <td>
                            <a href="/anuncios/eliminar/<?php echo($anuncio->obtenerId(
                            )); ?>" class="btn btn-sm btn-danger">Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>                                  
            </table>
             
        </div>
    </div>
</section>