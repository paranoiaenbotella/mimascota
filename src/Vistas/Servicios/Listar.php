<!--Tabla con servicios-->
<section class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
            <h6 class="mb-3"> Servicios del usuario:</h6>
            
            <table class="table table-sm table-hover border border-success">
                <thead>
                    <tr class="bg-success text-white">
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th colspan="2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos["servicios"] as $servicio): ?>
                    <tr>
                        <td><?php echo $servicio->obtenerId(); ?></td>
                        <td><?php echo $servicio->obtenerUsuario(); ?></td>
                        <td><?php echo $servicio->obtenerNombre(); ?></td>
                        <td><?php echo $servicio->obtenerDescripcion(); ?></td>
                        <td><?php echo ($servicio->obtenerPrecio()); ?></td>
                        <td>
                            <a href="/servicios/editar/<?php echo($servicio->obtenerId(
                            )); ?>" class="btn btn-sm btn-info">Editar
                            </a>
                        </td>
                        <td>
                            <a href="/servicios/eliminar/<?php echo($servicio->obtenerId(
                            )); ?>" class="btn btn-sm btn-danger">Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>                                  
            </table>
             <a href="/servicios/crear" class="btn btn-sm btn-outline-success">Crear servicios</a> 
             <a href="/perfil" class="btn btn-sm btn-outline-success">Regresar a perfil</a>
        </div>
    </div>
</section>