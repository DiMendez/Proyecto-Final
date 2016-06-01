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
	    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</head>
	<body>
    		<div id="grafica" style="width: 800px; height: 800px;"></div>
		<?php
			$conexion=mysqli_connect("127.0.0.1","root","MOOKAD00","PROFIN");
			mysqli_set_charset($conexion,"utf8");
			$query="SELECT * FROM VISITAS;";
			$saca=mysqli_query($conexion,$query);
			$arr[]=mysqli_fetch_assoc($saca);
			$visit=$arr[0];
			$num1=$visit['VISITAS_J'];
			$num2=$visit['VISITAS_P'];
			$num3=$visit['VISITAS_C'];
			echo'
		    	<script type="text/javascript">
			      google.charts.load("current", {packages:["corechart"]});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ["Visitas", "Visitantes"],
				  ["Alumnos",  '.$num1.'],
				  ["Profesores",'.$num2.'],
				  ["Coordinadores",'.$num3.'],
				]);
				var chart = new google.visualization.PieChart(document.getElementById("grafica"));
				chart.draw(data);
			      }
		    	</script>';
		?>
  </body>
</html>
