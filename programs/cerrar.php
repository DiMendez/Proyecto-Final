<?php
session_name('actual');
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Nombre</title>
	</head>
	<body>
		<h1>¡Hasta la próxima!</h1>
		<a href="../templates/principal.html">Página Principal</a>
	</body>
</html>