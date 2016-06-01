<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewpiort" content="width=device-width, initial-scale=1"/>
		<script src="jquery-2.2.3.js"></script>
		<title>Eliminación de usuarios</title>
		<script src="../frameworks/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../frameworks/bootstrap-3.3.6-dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../styles/board.css"/>
	</head>
	<body>
		<?php
			$dat=date('Y-m-d');
			$con=mysqli_connect("127.0.0.1","root","","PROFIN");
			mysqli_set_charset($con,"utf8");
			if($con)
			{
				$query="SELECT * FROM PROFESOR;";
				$query2="SELECT USUARIO_NO,ALUMNO_NOMBRE,ALUMNO_FECHA FROM ALUMNO;";
				$consul=mysqli_query($con,$query);
				$consul2=mysqli_query($con,$query2);
				$nconsul=mysqli_num_rows($consul);
				$nconsul2=mysqli_num_rows($consul2);
				$numero=$nconsul+$nconsul2;
				echo'<div class="container">
					<form class="form-horizontal" action="eliminiausu.php" method="POST">
						<h3 class="text-center">PROFESORES</h3>
						<table class="table table-hover">
							<tr>
								<th>USUARIO </th>
								<th>ÚLTIMA FECHA DE ENTRADA </th>
								<th>¿ELIMINAR?</th>
							</tr>';
						for($n=0;$n<$nconsul;$n++)
						{
							$pro[]=mysqli_fetch_assoc($consul);
							$profs=$pro[$n];
							echo'<tr>
								<td>'.$profs["PROFESOR_NOMBRE"].'</td>
								<td>'.$profs["PROFESOR_FECHA"].'</td>
								<td class="text-center"><input type="checkbox" name="pregsi'.$n.'"
								value="'.$profs["USUARIO_NO"].'"/></td>
							</tr>';
						}
						echo'</table>
						<h3 class="text-center">ALUMNOS</h3>
						<table class="table table-hover">
							<tr>
								<th>USUARIO </th>
								<th>ÚLTIMA FECHA DE ENTRADA </th>
								<th>¿ELIMINAR?</th>
							</tr>';
						for($n=$nconsul;$n<$numero;$n++)
						{
							$al[]=mysqli_fetch_assoc($consul2);
							$alumn=$al[$n-$nconsul];
							/*$fa=strtotime($alumn["ALUMNO_FECHA"]);
							$fa2=strtotime($dat);
							$fech2=$fa2-$fa1;
							$d1=date_create($dat);
							var_dump($d1);
							$d2=date_create($alumn["ALUMNO_FECHA"]);
							var_dump($d2);
							$fech3=	date_diff($d1,$d2);
							echo $fech3;
					
							if($fech>300)
							{*/
							echo'<tr>
								<td>'.$alumn["ALUMNO_NOMBRE"].'</td>
								<td>'.$alumn["ALUMNO_FECHA"].'</td>
								<td class="text-center"><input type="checkbox" name="pregsi'.$n.'"
								value="'.$alumn["USUARIO_NO"].'"/></td>
							</tr>';
							
						}
						echo'</table>
						<input class="btn btn-danger" type="submit" value="Eliminar"/>
						<a class="btn btn-info" href="inicio.php">Regresar a Inicio</a>
					</form>
				</div>';
			}
			else
				echo'Algo anda mal';
		?>
	</body>
</html>
