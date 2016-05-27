<!DOCTYPE html>
<html>
	<?php
		echo'<head>
			<title>Agregar Preguntas</title>
		</head>
		<body>
			<form method="POST" action="preguntas.php">
				<fieldset id="materia_fieldset">
					<legend>Escoge materia a la que desees agregar reactivos</legend>';
					$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
					if($conexion)
					{
						$result=mysqli_query($conexion,'SELECT MATERIA_NO, MATERIA_NOMBRE FROM MATERIAS');
					echo'<select id="materia" name="materia">
							<option selected>Escoge materia</option>';
						if(mysql_num_rows($result)==0)
							echo 'auch';
						else 
							echo 'uh';
						for($x=0;$x<mysql_num_rows($result);$x++)
						{
							$resultArray=mysql_fetch_assoc($result);
							echo '<option value="'.$resultArray['MATERIA_NO'].'">'.$resultArray['MATERIA_NOMBRE'].'</option>';
						}
					echo'</select><br/>';
					}
			echo'</fieldset>
				<fieldset id="unidad-field">
					<legend>Por favor, elija la unidad</legend>
				</fieldset>
				<fieldset id="reactivo">
					<textarea name="reactivo"></textarea>
				</fieldset>
				<fieldset id="opciones">
				</fieldset>
				</form>
		<script src="../programs/jquery-2.2.3.js"></script>
			<script src="../programs/unidades.js"></script>
		</body>';
	?>
</html>