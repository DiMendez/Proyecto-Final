<!--Por Diana Manda a pantalla las preguntas para confirmar-->
<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewpiort" content="width=device-width, initial-scale=1"/>
		<script src="jquery-2.2.3.js"></script>
		<title>Confirmación de preguntas</title>
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../frameworks/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../frameworks/bootstrap-3.3.6-dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../styles/board.css"/>
	</head>
	<body>
		<?php
			$con=mysqli_connect("127.0.0.1","root","","PROFIN");
			mysqli_set_charset($con,"utf8");
			if($con)
			{
				$query="SELECT * FROM PREGUNTAS WHERE PREGUNTA_XCONFIRMAR='NO';";
				$consul=mysqli_query($con,$query);
				$numero=mysqli_num_rows($consul);
				echo'<div class="container">
					<form action="elimina.php" class="form-horizontal" method="POST">
						<table class="table table-hover">
							<tr>
								<th>IMÁGENES </th>
								<th>PREGUNTA </th>
								<th>OPCIÓN 1 </th>
								<th>OPCIÓN 2 </th>
								<th>OPCIÓN 3 </th>
								<th>OPCIÓN 4 </th>
								<th>NÚMERO DE LA RESPUESTA</th>
								<th>¿ELIMINAR?</th>
							</tr>';
						for($n=0;$n<$numero;$n++)//manda preguntas por confirmar
						{
							$arrPreg[]=mysqli_fetch_assoc($consul);
							$pregunta=$arrPreg[$n];
							echo'<tr>';
								if($pregunta["PREGUNTA_MEDIA"]!=NULL)
									echo'	<td>'.$pregunta["PREGUNTA_MEDIA"].'</td>';
								else
									echo'	<td>No hay Imágenes</td>
								<td>'.$pregunta["PREGUNTA_NOMBRE"].'</td>
								<td>'.$pregunta["PREGUNTA_OPCION1"].'</td>
								<td>'.$pregunta["PREGUNTA_OPCION2"].'</td>
								<td>'.$pregunta["PREGUNTA_OPCION3"].'</td>
								<td>'.$pregunta["PREGUNTA_OPCION4"].'</td>
								<td>'.$pregunta["PREGUNTA_RESPUESTA"].'</td>
								<td><input type="checkbox" name="pregsi'.$n.'"
								value="'.$pregunta["PREGUNTA_NOMBRE"].'"/></td>
							</tr>';
						}
						echo'</table>
						<input class="btn btn-block btn-danger" type="submit" value="Eliminar"/>
						<a class="btn btn-block btn-info" href="inicio.php">Regresar a Inicio</a>
					</form>
				</div>';
			}
			else
				echo'<div class="alert alert-warning">Algo anda mal';
		?>
	</body>
</html>
