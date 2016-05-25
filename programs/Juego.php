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
			if(isset($_POST["num_mat"]))
			{
				$materia=$_POST["num_mat"];
				if(isset($_POST["num_unidad"]))
				{	
					$unidad=$_POST["num_unidad"];
					$consul=mysqli_query($con,"SELECT PREGUNTA_NOMBRE,PREGUNTA_MEDIA,PREGUNTA_OPCION1,PREGUNTA_OPCION2, 						PREGUNTA_OPCION3,PREGUNTA_OPCION4 FROM PREGUNTAS WHERE MATERIA_NO='".$materia."' AND 						UNIDAD_NO='".$unidad."'");
					//var_dump($preguntas);
					$numero=mysqli_num_rows($consul);
					echo $numero;
					$preguntas=mysqli_fetch_assoc($consul);
					foreach($preguntas as $e)
						echo $e;
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
