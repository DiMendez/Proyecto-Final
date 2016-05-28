<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php
		session_name('actual');
		session_start();
		if(isset($_SESSION['usuario']) && isset($_SESSION['tipo']))
		{
			echo '<form action="modificar.php" method="post">
				<label>Nombre de usuario</label><input type="password" name="us-nuevo"/>
				<input type="submit" value="Modificar"/>
			</form>
			<form action="modificar.php" method="post">
				<label>Contraseña actual</label><input type="password" name="actual"/>
				<label>Contraseña nueva</label><input type="password" name="nueva"/>
				<input type="submit" value="Modificar"/>
			</form>';
		}
		else
			echo '<p>Inicia sesión</p><a href="../templates/principal.html">Página Principal</a>';
		?>
	</body>
</html>