<!--Por Kevin y Bruce principalmente-->
<!DOCTYPEhtml>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewpiort" content="width=device-width, initial-scale=1"/>
		<title>RANDOM</title>
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../frameworks/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../frameworks/bootstrap-3.3.6-dist/css/bootstrap.css"/>
		<link rel="stylesheet" href="../styles/board.css"/>
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
						for($x=1;$x<21;$x++) //saca unidades dependiendo de la materia elegida 
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
						<section class="container-fluid" id="juego">
						<form method="post" class="form-horizontal" action="cerrar.php">
							<input type="hidden" name="materia" id="mat-ronda" value="'.$_POST["materia"].'"/>
							<input type="hidden" name="unidades" id="uni-ronda" value="'.$unidades.'"/>
							<div class="col-xs">
							<input class="block-center btn btn-block btn-success" type="submit" value="Empezar" id="empezar"/>
							</div>
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
