<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Todos los libros</title>
</head>
<body>
	<?php foreach ($libros as $libro): ?>
		<p>
			<?=$libro['nombre']?>, por <?=$libro['autor']?>
			<br>
		</p>
	<?php endforeach ?>
</body>
</html>