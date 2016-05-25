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
			$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
			$usuario=mysqli_real_escape_string($conexion,$_POST['usuario']);
			$query='SELECT * FROM USUARIOS WHERE US_NUM="'.$usuario.'";';
			$result=mysqli_query($conexion,$query);
			
			if(mysqli_num_rows($result)>0)
			//if($_POST['usuario']=='315294378')		//existe el usuario en la DB
			{
				echo 'usuario bien';
				$resultArray=mysqli_fetch_assoc($result);
				$contra=mysqli_real_escape_string($conexion,$_POST['contra']);	//implementar hash?
				if($contra==$resultArray['USUARIO_HSP'])
				//if($_POST['contra']=='hola')
				{	
					echo 'Todo bien';					//IDEA: Aquí creas las variables de sesión y más abajo pones lo demás
					$tipo=$resultArray['US_TIPO'];
					session_start();
					$_SESSION['nombre']=$resultArray['US_NOMBRE'];
					$_SESSION['tipo']=$tipo;
					$_SESSION['usuario']=$resultArray['US_NUM'];
					
					/*if($tipo=='J')						//esto se comentaria
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
					}*/
				}
				else
					echo '<p>Contraseña incorrecta</p><a href="principal.html">Página Principal</a>';
			}
			else
				echo '</p>Ese usuario no existe</p><a href="principal.html">Página Principal</a>';
			
			mysqli_close($conexion);
		}
		/*else
			echo '<p>Inicia sesión</p><a href="principal.html">Página Principal</a>';	//esto se comenta*/
		if(isset($_SESSION['nombre']) && isset($_SESSION['tipo']) && isset($_SESSION['usuario']))
		{
			if($_SESSION['TIPO']=='J')						
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
			echo '<p>Inicia sesión</p><a href="principal.html">Página Principal</a>';
		?>
	</body>
</html>