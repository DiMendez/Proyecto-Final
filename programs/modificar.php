<?php
session_name('actual');
session_start();
if(isset($_SESSION['tipo']) && isset($_SESSION['usuario']))
{
	$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
	if(isset($_POST['us-nuevo']))
	{
		if($_SESSION['tipo']=='J')
		{
			$dato='ALUMNO_NOMBRE';
			$tabla='ALUMNO';
		}
		else if($_SESSION['tipo']=='P' || $_SESSION['tipo']=='C')
		{
			$dato='PROFESOR_NOMBRE';
			$tabla='PROFESOR';
		}
		$nuevo=mysqli_real_escape_string($conexion,$_POST['us-nuevo']);
		$query='UPDATE '.$tabla.' SET '.$dato.'="'.$nuevo'" WHERE USUARIO_NO="'.$_SESSION["usuario"].'";';
		if(mysqli_query($conexion,$query))
		{
			echo '<p>Tu nombre ha sido cambiado</p><a href="inicio.php">Regresar</a>';
		}
		else
			echo '<p>Hubo un error</p><a href="inicio.php">Regresar</a>';
	}
	else if(isset($_POST['nueva']) && isset($_POST['actual']))
	{
		//insertar hash a $_POST['actual']
		$consulConAct='SELECT USUARIO_HSP FROM USUARIO WHERE USUARIO_NO="'.$_SESSION['usuario'].'";';
		$resul=mysqli_query($conexion,$consulConAct);
		$arr=mysqli_fetch_assoc($resul);
		if($arr['USUARIO_HSP']==$_POST['actual'])
		{
			$nueva=$_POST['actual'];
			if(preg_match('/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i',$nueva)==1)
			{
				$conNueva=mysqli_real_escape_string($nueva);
				$query='UPDATE USUARIO SET USUARIO_HSP="'.$conNueva.'" WHERE USUARIO_NO="'.$_SESSION["usuario"].'";';
				if(mysqli_query($conexion,$query))
				{
					echo '<p>Tu contraseña ha sido cambiada</p><a href="inicio.php">Regresar</a>';
				}
				else
					echo '<p>Hubo un error</p><a href="inicio.php">Regresar</a>';
			}
			else
				echo '<p>Tu nueva contraseña no cumple con las características. Tus cambios no fueron hechos</p>
				<a href="modificarForm.php">Regresar</a>';
		}
		else
			echo '<p>Esa no es tu contraseña</p><a href="modificarForm.php">Regresar</a>';
	}
	else
		echo '<p>No pusiste nada</p><a href="modificarForm.php">Regresar</a>';
}
else
	echo '<p>Inicia sesión</p><a href="../templates/principal.html">Página Principal</a>';
?>