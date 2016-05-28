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
			$con=mysqli_connect("127.0.0.1","root","MOOKAD00","PROFIN");
			if($con)
			{
				$query="SELECT * FROM PREGUNTAS WHERE PREGUNTA_XCONFIRMAR='NO';";
				$consul=mysqli_query($con,$query);
				$numero=mysqli_num_rows($consul);
				echo'<div class="container">
					<form action="elimina.php" class="form-horizontal" method="POST">
						<table class="table table-hover">
							<tr>
								<td>IMÁGENES </td>
								<td>PREGUNTA </td>
								<td>OPCIÓN 1 </td>
								<td>OPCIÓN 2 </td>
								<td>OPCIÓN 3 </td>
								<td>OPCIÓN 4 </td>
								<td>NÚMERO DE LA RESPUESTA</td>
								<td>¿ELIMINAR?</td>
							</tr>';
						for($n=0;$n<$numero;$n++)
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
					</form>
				</div>';
			}
			else
				echo'<div class="alert alert">Algo anda mal';
		?>
	</body>
</html>
