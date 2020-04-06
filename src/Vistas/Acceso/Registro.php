<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>MiMascota</title>
	</head>
	<body>
		<p>Introduzca datos.</p>
			<?php if ($usuario1 === true): ?>
            <p>¡Usuario registrado!</p>
        	<?php else: ?>
            <p>¡Usuario no registrado!</p>
        	<?php endif; ?>

        	<?php if ($direccion1 === true): ?>
            <p>¡Se añadió la dirección al usuario!</p>
        	<?php else: ?>
            <p>¡Dirección no añadida!</p>
        	<?php endif; ?>
	</body>
</html>