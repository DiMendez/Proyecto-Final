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
			echo '<div class="container">
			<div class="col-xs text-center"><h1>
				Modificar Perfil<h1>
			</div>
			<form class="form-horizontal" action="modificar.php" method="post">
			<div class="form-group">
				<label class="control-label col-xs col-md-2">Nombre de usuario</label>
					<div class="col-xs col-md-10">
					<input class="form-control" type="text" name="us-nuevo"/>
					</div>
			</div>
			<div class="form-group">
				<div class=" col-xs col-md-10 col-md-offset-2 ">
					<input class="btn btn-block btn-warning" type="submit" value="Modificar"/>
				</div>
			</div>
			</form>
			<form class="form-horizontal" action="modificar.php" method="post">
				<div class="form-group">
					<label class="control-label col-xs col-md-2">Contraseña actual</label>
					<div class="col-xs col-md-10">
						<input class="form-control" type="password" name="actual"/>
					</div>
					<label class="control-label  col-xs col-md-2">Contraseña nueva</label>
					<div class="col-xs col-md-10">
						<input class="form-control" type="password" name="nueva"/>
					</div>
				</div>
				<div class="form-group">
					<div class=" col-xs col-md-10 col-md-offset-2 ">
					<input class="btn btn-block btn-warning"type="submit" value="Modificar"/>
					<a class="btn btn-block btn-info" href="inicio.php">Regresar a Inicio</a>
					</div>
				</div>
		</form></div>';
		}
		else
			echo '<p>Inicia sesión</p><a class="btn btn-success" href="../templates/principal.html">Página Principal</a>';
		?>
	</body>
</html>