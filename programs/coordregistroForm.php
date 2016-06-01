<!DOCTYPE html>
<html>
	<head>
		<title>Registro</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="../programs/jquery-1.8.2.min.js"></script>
		<script src="../programs/jquery.validate.js"></script>
		<script src="../programs/additional-methods.js"></script>
		<script src="../programs/coordregistro.js"></script>
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
		if($_SESSION['tipo']=='A')
		{
			echo '<header class=" text-center container">
				<h1>
				Registrar Coordinadores
				</h1>
			</header>
			<section class="container">
				<div class="row">
					<div class="col-xs" id="ok">
					</div>
				</div>	
				<form class="form-horizontal" method="POST" id="form">
					<div class="form-group">
						<label class="control-label col-xs col-sm-2">Nombre</label>
						<div class="col-xs col-sm-10">
							<input class="form-control" type="text" name="nom" id="nom" pattern="[A-z\s]{4,20}" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs col-sm-2">Apellido paterno</label>
						<div class="col-xs col-sm-10">
							<input class="form-control"  type="text" id="app"name="app"pattern="[A-z\s]{4,20}"required/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs col-sm-2">Apellido materno</label>
						<div class="col-xs col-sm-10">
							<input class="form-control" type="text"name="apm" id="apm"pattern="[A-z\s]{4,20}"required/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs col-sm-2">Cuenta</label>
						<div class="col-xs col-sm-10">
							<input class="form-control" type="text" name="cuenta" id="cuenta"pattern="[\d]{6}" required/>	
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs col-sm-2">Contraseña</label>
						<div class="col-xs col-sm-10">
							<input class="form-control" type="password" name="contra" id="contra" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs col-sm-2">Compruebe contraseña</label>
						<div class="col-xs col-sm-10">
							<input class="form-control"  type="password" name="contra2" id="contra2" required/>
						</div>
					</div>
					<p><span></span>
					<div class="form-group">
						<div class="col-xs col-sm-10 col-sm-offset-2">
							<input class="btn btn-block btn-success" type="submit" value="Registrar"/>
						</div>
					</div>
				</form>
			</section>';
		}
		else
			echo '<h2>No tienes permiso de estar aquí</h2><a href="inicio.php">Regresar</a>';
	}
	else
		echo '<a href="../templates/principal.html>Inicia sesión</a>"';
	?>
	</body>
</html>
