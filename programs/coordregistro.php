<!--Por Alma Registra coordinadores-->
<?php
	$conexion=mysqli_connect('localhost','root','MOOKAD00','PROFIN'); //establece conexión con la DB PROFIN
	$nom=$_POST['nom']; //evita inyecciones sql C: 
	$app=mysqli_real_escape_string($conexion,$_POST['app']);
	$apm=mysqli_real_escape_string($conexion,$_POST['apm']);
	$cuenta=mysqli_real_escape_string($conexion,$_POST['cuenta']);
	$contra=mysqli_real_escape_string($conexion,$_POST['contra']);
	$s=' ';
	//revisa si en la base de datos no está la cuenta
	$nombreQ=mysqli_query($conexion,'SELECT USUARIO_NO,USUARIO_HSP FROM USUARIO WHERE USUARIO_NO="'.$cuenta.'";');
	function ups() //simple y mortal función, regresa a la página de admin
	{
			echo'<br/>';
			echo'<a href="../programs/inicio.php">Regresar</a>';
			return;
	}
	//validación en php
	$a=((preg_match('/^[A-z\s]{4,28}$/i', $nom))==1)?true:false;
	$b=((preg_match('/^[A-z\s]{4,28}$/i', $nom))==1)?true:false;
	$c=((preg_match('/^[A-z\s]{4,28}$/i', $nom))==1)?true:false;
	$d=((preg_match('/^[0-9]{6}$/i', $cuenta))==1)?true:false;
	$e=((preg_match('/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i' ,$contra))==1)?true:false;
	if(($a && $b && $c && $d && $e)== true) //si pasa por las REGEX entonces..
	{
		if(mysqli_num_rows($nombreQ)==0) //si hay 0 registros con ese no. de cuenta...
		{
			$insertar=mysqli_query($conexion,'INSERT INTO USUARIO(USUARIO_NO,USUARIO_HSP,USUARIO_TIPO) VALUES("'.$cuenta.'","'.$contra.'","C");');
			//inserta número de cuenta, nombre, app, apm a la tabla profesor 
			$insertnom=mysqli_query($conexion,'INSERT INTO PROFESOR(USUARIO_NO,PROFESOR_NOMBRE) VALUES("'.$cuenta.'","'.$nom.$s.$app.$s.$apm.'");');
			//comprueba que haya insertado a la DB
			if($insertnom && $insertar)
			{
				echo 'El registro se ha efectuado de manera exitosa para el coordinador: '.$nom;
				ups();
			}
			else
			{
				echo 'Algo ha fallado con el registro';
				ups();
			}
		}
		else
			ups();
	}
	else
	{
		echo' Es posible que no hayas introducido datos válidos';
		ups();
	}
?>
