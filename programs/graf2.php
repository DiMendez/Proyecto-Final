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
	    <script type="text/javascript" src="loader.js"></script>
	</head>
	<body>
		<div id="chart_div" style="width: 100vw; height: 90vh;"></div>
		<?php
			$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
			$query="SELECT * FROM VISITAS;";
			$saca=mysqli_query($conexion,$query);
			$arr[]=mysqli_fetch_assoc($saca);
			$visit=$arr[0];
			$num1=$visit['VISITAS_J'];
			$num2=$visit['VISITAS_P'];
			$num3=$visit['VISITAS_C'];
			$num4=$num1+$num2+$num3;
			echo'<script type="text/javascript">
		    	google.charts.load("current", {"packages":["gauge"]});
		      	google.charts.setOnLoadCallback(drawChart);
		      	function drawChart() {
				var data = google.visualization.arrayToDataTable([
					  ["Visitas", "Visitantes"],
					  ["Alumnos",  '.$num1.'],
					  ["Profesores",'.$num2.'],
					  ["Coordinadores",'.$num3.']
				]);
				var options = {
				  width: 500, height: 500,
				  redFrom: 90, redTo: 100,
				  yellowFrom:75, yellowTo: 90,
				  minorTicks: 5
				};
				var chart = new google.visualization.Gauge(document.getElementById("chart_div"));
				chart.draw(data, options);
		      	}
		    </script>
			<a class="btn btn-block btn-info" href="inicio.php">Regresar a Inicio</a>';
		?>
	  </body>
</html>

