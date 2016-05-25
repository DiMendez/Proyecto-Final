<!--Por Kevin. Página de inicio para todos los usuarios.
Dependiendo de su tipo, es el contenido que se desplegará.
Falta conexión con BD y el contenido que se desplegará-->

<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nombre</title>
	</head>
	<body>
		<?php
		//Por Bruce
		
		if(isset($_POST['usuario']) && isset($_POST['contra']))
		{
			//insertar la query
			if($_POST['usuario']=='315294378')		//existe el usuario en la DB
			{
				echo 'usuario bien';
				if($_POST['contra']=='hola')
				{
					echo 'Todo bien';
					if($tipo=='J')
					{
						jugador();	//despliega pantalla para el alumno
					}
					else if($tipo=='P')
					{
						profesor();	//despliega pantalla para el profesor
					}
					else if($tipo=='C')
					{
						coordinador();	//despliega pantalla para el coordinador
					}
					else if($tipo=='A')
					{
						administrador();	//despliega pantalla para el administrador
					}
				}
				else
					echo '<p>Contraseña incorrecta</p><a href="principal.html">Página Principal</a>';
			}
			else
				echo '</p>Ese usuario no existe</p><a href="principal.html">Página Principal</a>';
		}
		else
			echo '<p>Inicia sesión</p><a href="principal.html">Página Principal</a>';
		?>
	</body>
</html>