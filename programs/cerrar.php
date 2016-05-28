<?php
session_name('actual');
session_start();
session_unset();
session_destroy();
?>
<!--Por Kevin Cierra-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Nombre</title>
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../frameworks/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../frameworks/bootstrap-3.3.6-dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../styles/board.css"/>
	</head>
	<body>
		<h1 class="text-center">¡Hasta la próxima!</h1>
		<a class="btn btn-info btn-block" href="../templates/principal.html">Página Principal</a>
	</body>
</html>
