<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewpiort" content="width=device-width, initial-scale=1"/>
		<title>Seguridad</title>
	</head>
	<body>
	<?php
		$con=mysqli_connect("127.0.0.1","root","MOOKAD00","PROFIN");
		if($con)
		{
			if(isset($_POST["nombre_mat"]))
			{
				$materia=$_POST["nombre_mat"];
				if(isset($_POST["nombre_asig"]))
				{	
					$preguntas=mysqli_query($enlace,"SELECT PREGUNTA_NOMBRE,PREGUNTA_MEDIA,PREGUNTA_OPCION1,PREGUNTA_OPCION2, 						PREGUNTA_OPCION3,PREGUNTA_OPCION4 FROM PREGUNTAS WHERE MATERIA_NO='".$materia."',UNIDAD_NO='".$unidad."';");
				}
				else
					echo'¿Pero de cuál asignatura?';
			}
			else
				echo'¿De cuál materia?';
		}
		else
			echo'Error de conexión';
	?>
	</body>
</html>
