<!DOCTYPE html>
<html>
	<?php
		echo'<head>
			<title>Agregar Preguntas</title>
			<meta charset="UTF-8" />
			<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../frameworks/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../frameworks/bootstrap-3.3.6-dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../styles/board.css"/>
	</head>
		</head>
		<body>
			<div class container>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<p class="lead textcenter">
							<h1> Agrega preguntas</h1><br/>
						</p>
					</div>
				</div>
			</div>
			<div class="container">
			<form method="POST" class="form-horizontal"action="preguntas.php" >
				<fieldset id="materia_fieldset">
					<legend>Escoge materia a la que desees agregar reactivos</legend>';
					$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
					if($conexion)
					{
						$result=mysqli_query($conexion,'SELECT MATERIA_NO,MATERIA_NOMBRE FROM MATERIAS;');
					echo'<select class="form-control" id="materia" name="materia">
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
					<div class="form-group">
					<label>Añade reactivo</label>
					<textarea name="reactivo" maxlength="200"></textarea>
					</div>
					<input type="hidden" name="MAX_FILE_SIZE" value="100000">
				</fieldset>
				<fieldset id="opciones" class="form-group">
					<label>Opción uno</label><input class="form-control" type="text" name="uno" id="uno"/>
					<label>Opción dos</label><input class="form-control" type="text" name="dos" id="dos"/>
					<label>Opción tres</label><input class="form-control" type="text" name="tres" id="tres"/>
					<label>Opción cuatro</label><input class="form-control" type="text" name="cuatro" id="cuatro"/>
					<label>Respuesta correcta</label><input  class="form-control" type="number" name="correcta" max="4" min="1"/>
				</fieldset>
				<fieldset>
					<input  class="btn btn-block btn-success" type="submit">
				</fieldset>
				</form>
				</div>

		<script src="../programs/jquery-2.2.3.js"></script>
			<script src="../programs/addquestions.js"></script>
		</body>';
	?>
</html>
