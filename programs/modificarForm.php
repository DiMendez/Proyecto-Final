<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Modificar</title>
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../frameworks/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../frameworks/bootstrap-3.3.6-dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../styles/board.css"/>
	</head>
	<body>
		<?php
		session_name('actual');
		session_start();
		if(isset($_SESSION['usuario']) && isset($_SESSION['tipo']))
		{
			echo '<div class="container"><form class="form-horizontal" action="modificar.php" method="post">
				<label class="control-label">Nombre de usuario</label>
				<input class="form-control" type="password" name="us-nuevo"/>
				<input class="btn btn-block btn-warning" type="submit" value="Modificar"/>
			</form>
			<form class="form-horizontal" action="modificar.php" method="post">
				<label class="control-label">Contraseña actual</label><input class="form-control" type="password" name="actual"/>
				<label class="control-label">Contraseña nueva</label><input class="form-control" type="password" name="nueva"/>
				<input class="btn btn-block btn-warning"type="submit" value="Modificar"/>
			</form></div>';
		}
		else
			echo '<p>Inicia sesión</p><a class="btn btn-success" href="../templates/principal.html">Página Principal</a>';
		?>
	</body>
</html>