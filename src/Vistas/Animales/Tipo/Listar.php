<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MiMascota</title>
    </head>
    <body>
        <table class="listarRegistros">
            <caption>Lista con los tipos de animales registrados en la base de datos</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
               <?php 
                    foreach ($tipoAnimal as $valor) { ?>
                <tr>
                    <td><?php echo  $valor['id'];?></td>
                    <td><?php echo  $valor['nombre'];?></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
    </body>
</html>