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
			$q="SELECT * FROM PREGUNTAS WHERE PREGUNTA_XCONFIRMAR='NO';";
			$c=mysqli_query($con,$q);
			$n=mysqli_num_rows($c);
			for($i=0;$i<$n;$i++)
			{
				if(isset($_POST['pregsi'.$i]))
				{
					$borra=$_POST['pregsi'.$i];
					$query="DELETE FROM PREGUNTAS WHERE PREGUNTA_NOMBRE='".$borra."';";
					$consul=mysqli_query($con,$query);
					if($consul)
						echo'Elimindada';
					else
						echo'Ah no';
				}
			}
		}
	?>
	<script>

	</script>
	</body>
</html>
