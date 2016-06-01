<!--Por Diana elimina usuarios-->
<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewpiort" content="width=device-width, initial-scale=1"/>
		<script src="jquery-2.2.3.js"></script>
		<title>Elimina Usuarios</title>
	</head>
	<body>
	<?php
		$con=mysqli_connect("127.0.0.1","root","","PROFIN");
		if($con)
		{
			$query="SELECT * FROM PROFESOR;";
			$query2="SELECT USUARIO_NO,ALUMNO_NOMBRE,ALUMNO_FECHA FROM ALUMNO;";
			$consul=mysqli_query($con,$query);
			$consul2=mysqli_query($con,$query2);
			$nconsul=mysqli_num_rows($consul);
			$nconsul2=mysqli_num_rows($consul2);
			$numero=$nconsul+$nconsul2;
			for($i=0;$i<$nconsul;$i++)//elimina profesores
			{
				if(isset($_POST['pregsi'.$i]))
				{
					$borra=$_POST['pregsi'.$i];
					$query="DELETE FROM PROFESOR WHERE PROFESOR.USUARIO_NO='".$borra."';";
					$query2="DELETE FROM USUARIO WHERE USUARIO.USUARIO_NO='".$borra."';";
					$consul=mysqli_query($con,$query);
					$uconsul=mysqli_query($con,$query2);
					if($consul&&$uconsul)
						echo'<h2>Profesores eliminados correctamente<h2>';
					else
						echo'<h2>Hubo un error para eliminar profesores</h2>';
				}

			}
			for($i=$nconsul;$i<$numero;$i++)//elimina alumnos
			{
				if(isset($_POST['pregsi'.$i]))
				{
					$borra2=$_POST['pregsi'.$i];
					$query3="DELETE FROM ALUMNO WHERE USUARIO_NO='".$borra2."';";
					$query4="DELETE FROM USUARIO WHERE USUARIO_NO='".$borra2."';";
					$consul2=mysqli_query($con,$query3);
					$uconsul2=mysqli_query($con,$query4);
					if($consul2&&$uconsul2)
						echo'<h2>Alumnos eliminados correctamente</h2>';
					else
						echo'<h2>Hubo un error para eliminar alumnos</h2>';
				}

			}
			mysqli_close($con);
		}
		echo '<a href="inicio.php">Regresar</a>';
	?>
	</body>
</html>
