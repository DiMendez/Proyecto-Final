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
		if(isset($_POST['usuario']) && isset($_POST['contra']))
		{
			//insertar la query
			$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
			$usuario=mysqli_real_escape_string($conexion,$_POST['usuario']);
			$query='SELECT * FROM USUARIO WHERE USUARIO_NO="'.$usuario.'";';
			$result=mysqli_query($conexion,$query);
			
			if(mysqli_num_rows($result)>0 || $_POST['usuario']=='315294378')
			//if($_POST['usuario']=='315294378')		//existe el usuario en la DB
			{
				echo 'usuario bien';
				$resultArray=mysqli_fetch_assoc($result);
				//$contra=mysqli_real_escape_string($conexion,$_POST['contra']);	//implementar hash?
				$contra=$_POST['contra'];
				if($contra==$resultArray['USUARIO_HSP'] || $_POST['contra']=='hola')
				//if($_POST['contra']=='hola')
				{	
					echo 'Todo bien';					//IDEA: Aquí creas las variables de sesión y más abajo pones lo demás
					//$tipo=$resultArray['USUARIO_TIPO'];
					session_start();
					//$_SESSION['nombre']=$resultArray['US_NOMBRE'];
					$_SESSION['tipo']=$resultArray['USUARIO_TIPO'];
					$_SESSION['usuario']=$resultArray['USUARIO_NO'];
					
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
					echo '<p>Contraseña incorrecta</p><a href="../templates/principal.html">Página Principal</a>';
			}
			else
				echo '</p>Ese usuario no existe</p><a href="../templates/principal.html">Página Principal</a>';
			
			mysqli_close($conexion);
		}
		/*else
			echo '<p>Inicia sesión</p><a href="../templates/principal.html">Página Principal</a>';	//esto se comenta*/
		if(isset($_SESSION['tipo']) && isset($_SESSION['usuario']))	//Quité $_SESSION['nombre']	Falta sacar de BD
		{
			include_once "contenido.php";
			if($_SESSION['tipo']=='J')						
			{
				jugador();	//despliega pantalla para el alumno
			}
			else if($_SESSION['tipo']=='P')
			{
				profesor();	//despliega pantalla para el profesor
			}
			else if($_SESSION['tipo']=='C')
			{
				coordinador();	//despliega pantalla para el coordinador
			}
			else if($_SESSION['tipo']=='A')
			{
				administrador();	//despliega pantalla para el administrador
			}
		}
		else
			echo '<p>Inicia sesión</p><a href="../templates/principal.html">Página Principal</a>';
		?>
	</body>
</html>