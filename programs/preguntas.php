<?php
	$conexion=mysqli_connect("127.0.0.1","root","","PROFIN"); //Establece conexión con la base de datos
	if(isset ($_POST['materia']))
	{
		$materia=$_POST['materia'];
		if(isset($_POST['unidad']))
		{
			$unidad=$_POST['unidad'];
			if( isset($_POST['reactivo'])&& isset($_POST['uno']) && isset($_POST['dos']) && isset($_POST['tres']) && isset($_POST['cuatro']))
			{
				$reactivo=mysqli_real_escape_string($conexion,$_POST['reactivo']); //recibe cadena de la pregunta a agregar
				$opuno=mysqli_real_escape_string($conexion,$_POST['uno']); //Esto recibe la cadena de las opciones
				$opdos=mysqli_real_escape_string($conexion,$_POST['dos']); //Está protegido contra inyecciones sql
				$optres=mysqli_real_escape_string($conexion,$_POST['tres']);
				$opcuatro=mysqli_real_escape_string($conexion,$_POST['cuatro']);
				$correcta=mysqli_real_escape_string($conexion,$_POST['correcta']);
				/*if(isset($_FILES['media'])) //Si existe la selección del archivo
				{
					var_dump($_FILES['media']['name']);
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
								$cad='INSERT INTO PREGUNTAS VALUES("'.$materia.'",'.$unidad.',"'.$reactivo.'","../resources/'.$nomarchivo.'",
									"'.$opuno.'","'.$opdos.'","'.$optres.'","'.$opcuatro.'","'.$correcta.'","NO")';
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
				else*/if($conexion) //si no hay archivos y si hay conexión, entonces inserta a base de datos
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
						echo'<a href="../inicio.php">Regresar</a>';
						echo 'La pregunta se ha enviado exitosamente';
					}
				}
			}
			else 
			{
				echo'Es necesario que inserte cuatro opciones';
				echo'<a href="../inicio.php">Regresar</a>';
			}
		}
		else
			echo'Necesita escoger una unidad';
	}
	else
		echo'Necesita escoger una materia';
?>