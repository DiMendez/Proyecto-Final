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
			$q="SELECT PREGUNTA_NOMBRE FROM PREGUNTAS WHERE PREGUNTA_XCONFIRMAR='NO';";
			$c=mysqli_query($con,$q);
			$n=mysqli_num_rows($c);
			for($i=0;$i<$n;$i++)
			{
				if(isset($_POST['pregsi'.$i]))
				{
					$borra=$_POST['pregsi'.$i];
					$query="DELETE FROM PREGUNTAS WHERE PREGUNTA_NOMBRE='".$borra."' AND PREGUNTA_XCONFIRMAR='NO';";
					$consul=mysqli_query($con,$query);
					if($consul)
						echo'Elimindada';
					else
						echo'Ah no';
				}

			}
			$ca=mysqli_query($con,$q);
			$na=mysqli_num_rows($ca);
			for($i=0;$i<$na;$i++)
			{
				$yapasa[]=mysqli_fetch_assoc($ca);
				$si=$yapasa[$i];
				$nom="UPDATE PREGUNTAS SET PREGUNTA_XCONFIRMAR='SI' WHERE PREGUNTA_NOMBRE='".$si['PREGUNTA_NOMBRE']."';";
				$arregla=mysqli_query($con,$nom);
				if($arregla)
					echo'Success';
				else
					echo'No pus no';
			}
			mysqli_close($con);
		}
	?>
	<script>

	</script>
	</body>
</html>
