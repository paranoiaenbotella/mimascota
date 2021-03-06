<!--Tabla con direcciones-->
<section class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12  col-lg-12  shadow-sm p-3 mb-5 rounded">
      <h6 class="mb-3">Dirección:</h6>
      <?php if (isset($datos["direccion"])): ?>
      <table class="table table-sm table-hover border border-success">
        <thead>
          <tr class="bg-success text-white">
            <th>País</th>
            <th>Ciudad</th>
            <th>Código Postal</th>
            <th>Calle</th>
            <th colspan="2">Acción</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $datos["direccion"]->obtenerPais(); ?></td>
            <td><?php echo $datos["direccion"]->obtenerCiudad(); ?></td>
            <td><?php echo $datos["direccion"]->obtenerCodigoPostal(); ?></td>
            <td><?php echo $datos["direccion"]->obtenerCalle(); ?></td>
            <td>
              <a href="/direcciones/editar/<?php echo($datos["direccion"]->obtenerId(
                )); ?>" class="btn btn-sm btn-info">Editar
              </a>
            </td>
            <td>
              <a href="/direcciones/eliminar/<?php echo($datos["direccion"]->obtenerId(
                )); ?>" class="btn btn-sm btn-danger">Eliminar
              </a>
            </td>
          </tr>
        </tbody>
      </table>
      <?php else: ?>
      <p>No hay direcciones definidas.</p>
      <a href="/direcciones/crear" class="btn btn-sm btn-outline-success">Crear dirección</a>
      <?php endif; ?>
    </div>
  </div>
</section>