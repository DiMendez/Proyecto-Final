<!DOCTYPE html>
<html>
	<?php
		echo'<head>
			<title>Agregar Preguntas</title>
		</head>
		<body>
			<form method="POST" action="preguntas.php" enctype="multipart/form-data">
				<fieldset id="materia_fieldset">
					<legend>Escoge materia a la que desees agregar reactivos</legend>';
					$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
					if($conexion)
					{
						$result=mysqli_query($conexion,'SELECT MATERIA_NO,MATERIA_NOMBRE FROM MATERIAS;');
					echo'<select id="materia" name="materia">
							<option selected>Escoge materia</option>';
						if(mysqli_num_rows($result)>0)
						for($x=0;$x<mysqli_num_rows($result);$x++)
						{
							$resultArray=mysqli_fetch_assoc($result);
							echo '<option value="'.$resultArray["MATERIA_NO"].'">'.$resultArray["MATERIA_NOMBRE"].'</option>';
						}
					echo'</select><br/>';
					}
			echo'</fieldset>
				<fieldset id="unidad-field">
					<legend>Por favor, elija la unidad</legend>
				</fieldset>
				<fieldset id="reactivo">
					<label>Añade reactivo</label>
					<textarea name="reactivo" maxlength="200"></textarea>
					<br/>
					<input type="hidden" name="MAX_FILE_SIZE" value="100000">
					<legend>Añadir archivos (recomendado para imágenes)</legend>
					<input type="file" name="media"/>
				</fieldset>
				<fieldset id="opciones">
					<label>Opción uno</label><input type="text" name="uno" id="uno"/>
					<label>Opción dos</label><input type="text" name="dos" id="dos"/>
					<label>Opción tres</label><input type="text" name="tres" id="tres"/>
					<label>Opción cuatro</label><input type="text" name="cuatro" id="cuatro"/>
					<label>Respuesta correcta</label><input type="number" max="4" min="1"/>
				</fieldset>
				<fieldset>
					<input type="submit">
				</fieldset>
				</form>
		<script src="../programs/jquery-2.2.3.js"></script>
			<script src="../programs/unidades.js"></script>
		</body>';
	?>
</html>