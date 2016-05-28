<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nombre</title>		
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../frameworks/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../frameworks/bootstrap-3.3.6-dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../styles/board.css"/>
	</head>
	<body>
	<?php
		$conexion=mysqli_connect("127.0.0.1","root","","PROFIN"); //Establece conexión con la base de datos
		if(isset($_FILES['media']['tmp_name'])) //Si existe la selección del archivo
		{
			$nomarchivo=$_FILES['media']['name']; //guarda nombre del archivo
			$tipo=$_FILES['media']['type']; //Tipo del archivo
			$size=$_FILES['media']['size']; //Size del archivo
			//vamos a comprobar si el archivo que sube usuario es válido
			//si no encuentran una coincidencia con eso, entonces es incorrecto
			if(!((strpos($tipo,"gif") || strpos($tipo,"png") 
				|| strpos($tipo,"jpeg") || strpos($tipo,"bmp")) && ($size <200000)))
			{
				echo'El tamaño o la extensión no es correcta';
				echo'<br/>';
				echo'Se permiten archivos con extensión gif,jpeg,png,bmp y un tamaño menor a 200 kb';
				echo'<a href="../inicio.php">Regresar</a>';
			}
			else
			{
				//vamos a mandar la información a la DB
				$file=$_FILES['media']['tmp_name'];
				if(move_uploaded_file($file,'../resources/'.$nomarchivo)) //si se guarda en Resources...
				{
					if($conexion) //verifica que la conexión esté lista
					{
						$cad='INSERT INTO PREGUNTAS(PREGUNTA_MEDIA) VALUES("../resources/'.$nomarchivo.'");';
						$ruta=mysqli_query($conexion,$cad);
						if($ruta)
						{
							echo'Tu pregunta se ha cargado correctamente';
						}
						
					}
					else 
					{
						echo'Al parecer, hubo un error';
						echo'<a href="../inicio.php">Regresar</a>';
					}
				}
				else
				{
					echo'Al parecer hubo un error al cargar archivo';
					echo'<a href="../inicio.php">Regresar</a>';
				}
			}
		}
	?>
	</body>
</html>