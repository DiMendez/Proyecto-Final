<?php
function jugador()
{
	echo '<section class="container">
			<button class="btn btn-large" data-toggle="modal" data-target="#elmodal">
			</button>';
	echo'<div class="modal fade" role="dialog"><form id="escoger" action="Juego.php" method="POST">
					<fieldset class="form-horizontal">
						<legend>Tipo de juego</legend>
						<input type="radio" name="modo">Individual</input>
						<input type="radio" name="modo">Aleatorio</input>
						<input type="radio" name="modo">Escoger contrincante</input>
					</fieldset>
					<fieldset id="materia-field">
						<legend>Escoge materia</legend>';
						$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
						if($conexion)
						{
							$query='SELECT GRADO FROM ALUMNO WHERE USUARIO_NO="'.$_SESSION['usuario'].'";';
							$resultGrado=mysqli_query($conexion,$query);
							$grado=mysqli_fetch_assoc($resultGrado);
							$query='SELECT MATERIA_NO,MATERIA_NOMBRE FROM MATERIAS WHERE GRADO="'.$grado['GRADO'].'";';
							$result=mysqli_query($conexion,$query);
							echo '<select class="form-control" id="materia" name="materia">
									<option selected>Escoge unidad(es)</option>';
							for($x=0;$x<mysqli_num_rows($result);$x++)
							{
								$resultArray=mysqli_fetch_assoc($result);
								echo '<option value="'.$resultArray['MATERIA_NO'].'">'.$resultArray['MATERIA_NOMBRE'].'</option>';
							}
							echo '</select><br/>';
						} 
				echo '</fieldset>
					<fieldset id="unidad-field">
						<legend>Escoge Unidad</legend>
					</fieldset>
					<input class="btn btn-success btn-block"type="submit" value="Jugar"/>
				</form>';
	echo '</section>
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../programs/unidades.js"></script>';
}

function profesor()
{
	echo '<section>
	
	</section>';
}

function coordinador()
{
	echo '<section>
	
	</section>';
}

function administrador()
{
	echo '<section>
	
	</section>';
}	
?>
