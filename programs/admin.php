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
			$con=mysqli_connect("127.0.0.1","root","MOOKAD00","PROFIN");
			if($con)
			{
				$query="SELECT * FROM PROFESOR;";
				$query2="SELECT USUARIO_NO,ALUMNO_NOMBRE,ALUMNO_FECHA FROM ALUMNO;";
				$consul=mysqli_query($con,$query);
				$consul2=mysqli_query($con,$query2);
				$nconsul=mysqli_num_rows($consul);
				$nconsul2=mysqli_num_rows($consul2);
				$numero=$nconsul+$nconsul2;
				var_dump($nconsul2);
				echo'<div class="container">
					<form class="form-horizontal" action="eliminiausu.php" method="POST">
						PROFESORES
						<table class="table">
							<tr>
								<td>USUARIO </td>
								<td>ÚLTIMA FECHA DE ENTRADA </td>
								<td>¿ELIMINAR?</td>
							</tr>';
						for($n=0;$n<$nconsul;$n++)
						{
							$pro[]=mysqli_fetch_assoc($consul);
							$profs=$pro[$n];
							echo'<tr>
								<td>'.$profs["PROFESOR_NOMBRE"].'</td>
								<td>'.$profs["PROFESOR_FECHA"].'</td>
								<td><input type="checkbox" name="pregsi'.$n.'"
								value="'.$profs["USUARIO_NO"].'"/></td>
							</tr>';
						}
						echo'</table>
						ALUMNOS
						<table>
							<tr>
								<td>USUARIO </td>
								<td>ÚLTIMA FECHA DE ENTRADA </td>
								<td>¿ELIMINAR?</td>
							</tr>';
						for($n=$nconsul;$n<$numero;$n++)
						{
							var_dump($n);
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
								<td><input type="checkbox" name="pregsi'.$n.'"
								value="'.$alumn["USUARIO_NO"].'"/></td>
							</tr>';
							
						}
						echo'</table>
						<input type="submit" value="Eliminar"/>
					</form>
				</div>';
			}
			else
				echo'Algo anda mal';
		?>
	</body>
</html>
