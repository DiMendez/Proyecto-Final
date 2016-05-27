<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewpiort" content="width=device-width, initial-scale=1"/>
		<title>Seguridad</title>
		<script src="../programs/jquery-2.2.3.js"></script>
	</head>
	<body>
		
			<?php
			session_name('actual');
			session_start();
			if(isset($_SESSION['tipo']) && isset($_SESSION['usuario']))
			{
				if(isset($_POST["materia"]))
				{
					if(isset($_POST['unidades']))
						$unidades=$_POST['unidades'];
					else
					{
						$unidades='';
						for($x=1;$x<21;$x++)
						{
							$id='unidad-'.$x;
							if(isset($_POST[$id]))
								$unidades=$unidades.$_POST[$id].' ';
						}
					}
					$arrUnidades=explode(' ',$unidades);
					if(count($arrUnidades)>=1 && $arrUnidades[0]!='')
					{
						echo '
						<section id="juego">
						<form method="post" action="cerrar.php">
							<input type="hidden" name="materia" id="mat-ronda" value="'.$_POST["materia"].'"/>
							<input type="hidden" name="unidades" id="uni-ronda" value="'.$unidades.'"/>
							<input type="submit" value="Empezar" id="empezar"/>
						</form>
						</section>';
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
		
		
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../programs/juego.js"></script>
	</body>
</html>
