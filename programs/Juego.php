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
		<section id="juego">
			<?php
			session_name('actual');
			session_start();
			if(isset($_SESSION['tipo']) && isset$_SESSION['usuario'])
			{
				if(isset($_POST["materia"]))
				{
					$unidades='';
					for($x=1;$x<21;$x++)
					{
						$id='unidad-'.$x;
						if(isset($_POST[$id]))
							$unidades=$unidades.$_POST[$id].' ';
					}
					
					if(count(explode(' ',$unidades))>=1)
					{
						echo '<form id="empezar">
							<input type="hidden" name="materia" id="mat-ronda" value="'.$_POST["materia"].'"/>
							<input type="hidden" name="unidades" id="uni-ronda" value="'.$unidades.'"/>
							<input type="submit" value="Empezar"/>
						</form>';
					}
					else
						echo'<p>¿Pero de cuál unidad?</p><br/><a href="inicio.php">Regresar</a>';
				}
				else
					echo '<p>¿De cuál materia?</p><a href="inicio.php">Regresar</a>';
			}
			else
				echo '<p>Inicia sesión</p><a href="../templates/principal.html">Página Principal</a>';
			?>
		</section>
		
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../programs/juego.js"></script>
	</body>
</html>
