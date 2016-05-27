<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewpiort" content="width=device-width, initial-scale=1"/>
		<script src="jquery-2.2.3.js"></script>
		<title>Seguridad</title>
	</head>
	<body>
	<?php
		$con=mysqli_connect("127.0.0.1","root","","PROFIN");
		if($con)
		{
			if(isset($_POST["materia"]))
			{
				$materia=mysqli_real_escape_string($con,$_POST["materia"]);
				for($x=1;$x<21;$x++)
				{
					$id='unidad-'.$x;
					if(isset($_POST[$id]))
						$arrUnidades[]=$_POST[$id];
				}
				if(count($arrUnidades)>=1)
				{
					$query="SELECT * FROM PREGUNTAS WHERE PREGUNTA_XCONFIRMAR='SI' AND MATERIA_NO='".$materia."' AND UNIDAD_NO='".$arrUnidades[0]."'";
					for($i=1;$i<count($arrUnidades);$i++)
						$query=$query." OR UNIDAD_NO='".$arrUnidades[$i]."'";
					$consul=mysqli_query($con,$query.';');
					$numero=mysqli_num_rows($consul);
					for($n=0;$n<$numero;$n++)
						$arrPreg[]=mysqli_fetch_assoc($consul);
					$azar=rand(0,$numero-1);
					$pregunta=$arrPreg[$azar];
					echo "<div>".$pregunta['PREGUNTA_NOMBRE']."</div>
					<form id='pregunta'>
					<input type='submit' id='1' value='".$pregunta['PREGUNTA_OPCION1']."'/><br/>
					<input type='submit' id='2' value='".$pregunta['PREGUNTA_OPCION2']."'/><br/>
					<input type='submit' id='3' value='".$pregunta['PREGUNTA_OPCION3']."'/><br/>
					<input type='submit' id='4' value='".$pregunta['PREGUNTA_OPCION4']."'/><br/>
					<p id='pe'>".$pregunta['PREGUNTA_RESPUESTA']."</p><br/>";			
				}
				else
					echo'¿Pero de cuál unidad?';
			}
			else
				echo'¿De cuál materia?';
		}
		else
			echo'Error de conexión';
	?>
	<script>
		$("#pregunta").submit=function(){
			if($(this).attr("id")==$("#pe").val())
				alert('OK');
		};
	</script>
	</body>
</html>
