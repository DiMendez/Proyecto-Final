<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewpiort" content="width=device-width, initial-scale=1"/>
		<script src="jquery-2.2.3.js"></script>
		<title>Confirmación de preguntas</title>
	</head>
	<body>
	<?php
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
			for($i=0;$i<$nconsul;$i++)
			{
				if(isset($_POST['pregsi'.$i]))
				{
					$borra=$_POST['pregsi'.$i];
					var_dump($borra);
					$query="DELETE FROM PROFESOR WHERE PROFESOR.USUARIO_NO='".$borra."';";
					$query2="DELETE FROM USUARIO WHERE USUARIO.USUARIO_NO='".$borra."';";
					$consul=mysqli_query($con,$query);
					$uconsul=mysqli_query($con,$query2);
					if($consul&&$uconsul)
						echo'Elimindada1';
					else
						echo'Ah no1';
				}

			}
			for($i=$nconsul;$i<$numero;$i++)
			{
				if(isset($_POST['pregsi'.$i]))
				{
					$borra2=$_POST['pregsi'.$i];
					var_dump($borra2);
					$query3="DELETE FROM ALUMNO WHERE USUARIO_NO='".$borra2."';";
					$query4="DELETE FROM USUARIO WHERE USUARIO_NO='".$borra2."';";
					$consul2=mysqli_query($con,$query3);
					$uconsul2=mysqli_query($con,$query4);
					if($consul2&&$uconsul2)
						echo'Elimindada2';
					else
						echo'Ah no1';
				}

			}
			mysqli_close($con);
		}
	?>
	<script>

	</script>
	</body>
</html>
