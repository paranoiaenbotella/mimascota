<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>MiMascota</title>
	</head>
	<body>
		<p>Editar perfil de usuario.</p>
		<p>Animal:</p><br>
		        
			<?php if ($animal1 === true): ?>
            <p>¡El animal se ha creado!</p>
        	<?php else: ?>
            <p>¡No se ha podido crear el animal!</p>
        	<?php endif; ?>
	</body>
</html>