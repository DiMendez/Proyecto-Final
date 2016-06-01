<!--Por Alma principalmente y un poco por Diana-->
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
			if(isset ($_POST['materia']))
			{
				$materia=$_POST['materia']; //Materia que eligió
				if(isset($_POST['unidad']))
				{
					$unidad=$_POST['unidad']; //Recibe la unidad que eligió
					if( isset($_POST['reactivo']))
					{
						$reactivo=mysqli_real_escape_string($conexion,$_POST['reactivo']); //recibe cadena de la pregunta a agregar
						$opuno=mysqli_real_escape_string($conexion,$_POST['uno']); //Esto recibe la cadena de las opciones
						$opdos=mysqli_real_escape_string($conexion,$_POST['dos']); //Está protegido contra inyecciones sql
						$optres=mysqli_real_escape_string($conexion,$_POST['tres']);
						$opcuatro=mysqli_real_escape_string($conexion,$_POST['cuatro']);
						if(($opuno && $opdos && $optres && $opcuatro)!= 0)
						{
							if(($_POST['correcta'])!= 0)
							{
								$correcta=mysqli_real_escape_string($conexion,$_POST['correcta']); //recibe la respuesta correcta
								if($conexion) // si hay conexión, entonces inserta a base de datos
								{
									
									$cad='INSERT INTO PREGUNTAS VALUES("'.$materia.'",'.$unidad.',"'.$reactivo.'","",
										"'.$opuno.'","'.$opdos.'","'.$optres.'","'.$opcuatro.'","'.$correcta.'","NO")';
									$ruta=mysqli_query($conexion,$cad);
									if($ruta)
									{
										echo'Tu pregunta se ha cargado correctamente';
										echo'<form method="POST" action="preguntas_media.php" enctype="multipart/form-data">
											<label><legend>Añadir archivos (recomendado para imágenes)</legend></label>
											<input type="file" name="media" value="Upload Image"/>
											<input type="submit" name="Enviar"/>
										</form>';
									}	
									else 
									{
										echo'Al parecer, hubo un error';
										echo'<a href="./addpreguntas.php">Regresar</a>';
										echo 'La pregunta se ha enviado exitosamente';
									}
								}
							}
							else
							{
								echo'Es necesario que inserte la respuesta correcta';
								echo'<br/>';
								echo'<a href="./addpreguntas.php">Regresar</a>';
							}
						}
						else
						{
							echo'Es necesario que inserte las cuatro opciones';
							echo'<br/>';
							echo'<a href="./addpreguntas.php">Regresar</a>';
						}
					}
					else 
					{
						echo'Es necesario que inserte el reactivo';
						echo'<br/>';
						echo'<a href="./addpreguntas.php">Regresar</a>';
					}
				}
				else
				{
					echo'Necesita escoger una unidad';
					echo'<br/>';
					echo'<a href="./addpreguntas.php">Regresar</a>';
				}
			}
			else
			{
				echo'Necesita escoger una materia';
				echo'<br/>';
				echo'<a href="./addpreguntas.php">Regresar</a>';
			}
		?>
	</body>
</html>
