<?php
function jugador()
{
	echo '<h1>Bienvenido '.$usuario.'</h1>
		<section>
			<form>
				<fieldset>
					<legend>Tipo de juego</legend>
					<input type="radio" name="modo">Individual</input>
					<input type="radio" name="modo">Aleatorio</input>
					<input type="radio" name="modo">Escoger contrincante</input>
				</fieldset>
				<fieldset id="mat-uni">
					<legend>Escoge materia y unidades</legend>
					';
					$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
					if($conexion)
					{
						$query='SELECT GRADO FROM ALUMNO WHERE USUARIO_NO="'.$_SESSION['usuario'].'";';
						$grado=mysqli_query($conexion,$query);
						$query='SELECT MATERIA_NO,MATERIA_NOMBRE FROM MATERIAS WHERE GRADO="'.$grado.'";';
						$result=mysqli_query($conexion,$query);
						echo '<select id="materia" name="materia">';
						for($x=0;$x<mysqli_num_rows($result);$x++)
						{
							$resultArray=mysqli_fetch_assoc($result);
							echo '<option value="'.$resultArray['MATERIA_NO'].'">'.$resultArray['MATERIA_NOMBRE'].'</option>';
						}
						echo '</select>';
					}
			echo '</fieldset>
			</form>
		</section>
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../programs/unidades.js"></script>';
}
?>