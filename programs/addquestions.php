<!-- Por Alma Saca unidades-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nombre</title>		
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../frameworks/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../frameworks/bootstrap-3.3.6-dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../styles/board.css"/>
	</head>
	<body>
		<?php
		if(isset($_POST['materia']))
		{  
			$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
			mysqli_set_charset($conexion,"utf8");
			$query='SELECT UNIDAD_NO,UNIDAD_NOMBRE FROM UNIDAD WHERE MATERIA_NO="'.$_POST['materia'].'";';
			$result=mysqli_query($conexion,$query);
			$html='<legend>Escoge Unidad</legend>';
			for($x=0;$x<mysqli_num_rows($result);$x++)//Elige unidades
			{
				$y=$x+1;
				$resultArray=mysqli_fetch_assoc($result);
				$numero=$resultArray["UNIDAD_NO"];
				$nombre=$resultArray["UNIDAD_NOMBRE"];
				$nuevo='<div class="radio"><label>'.$numero.'.- '.$nombre.'
																<input type="radio" name="unidad" value="'.$numero.'"/>
															</label>
														</div>';
				$html=$html.$nuevo;
			}
			mysqli_close($conexion);
			echo $html;
		}
		?>
	</body>
</html>
