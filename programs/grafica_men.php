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
		function rad ($a,$b)
		{
			$c=($a*2)/$b;
			return $c;
		}
		$conexion=mysqli_connect("127.0.0.1","root","MOOKAD00","PROFIN");
		$query="SELECT * FROM VISITAS;";
		$saca=mysqli_query($conexion,$query);
		$arr[]=mysqli_fetch_assoc($saca);
		$visit=$arr[0];
		$num1=$visit['VISITAS_J'];
		$num2=$visit['VISITAS_P'];
		$num3=$visit['VISITAS_C'];
		$num4=$num1+$num2+$num3;
		$a=rad($num4,$num1);
		$b=rad($num4,$num2);
		$c=rad($num4,$num3);
		if($saca)
		{
			echo'<div>Las vistas de los Jugadores son:</div>
			<p id="jug">'.$num1.'</p>
			<div>Las visitas de los Profesores son:</div>
			<p id="pro">'.$num2.'</p>
			<div>Las visitas de los Coordinadores son:</div>
			<p id="cor">'.$num3.'</p>
			<canvas id="canv" width="500" height="500"></canvas>
			<script>
				var can=document.getElementById("canv");
				var cont=can.getContext("2d");
				var total='.$num4.';
				var jug='.$num1.';
				var pro='.$num2.';
				var cor='.$num3.';
				cont.beginPath();
				cont.arc(150,100,100,0,'.$a.'*Math.PI);
				cont.arc(150,100,100,0,'.$b.'*Math.PI);
				cont.arc(150,100,100,0,'.$c.'*Math.PI);
				cont.moveTo(150,100);
				cont.lineTo(250,100);
				cont.moveTo(150,100);
				cont.lineTo(250,100);
				cont.stroke();
			</script>';
		}
		else
			echo'No se pudo obtener información';
	?>
	</body>
</html>
