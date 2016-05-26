<?php
	$conexion=mysqli_connect('localhost','root','','PROFIN'); //establece conexión con la DB PROFIN
	$nom=mysqli_real_escape_string($conexion,$_POST['nom']); //evita inyecciones sql C: 
	$app=mysqli_real_escape_string($conexion,$_POST['app']);
	$apm=mysqli_real_escape_string($conexion,$_POST['apm']);
	$cuenta=mysqli_real_escape_string($conexion,$_POST['cuenta']);
	//revisa si en la base de datos no está la cuenta
	$nombreQ=mysqli_query($conexion,'SELECT USUARIO_NO,USUARIO_HSP FROM USUARIO WHERE USUARIO_NO="'.$cuenta.'";');
	function ups() //simple y mortal función, regresa a la página del cordinador
	{
			echo'<br/>';
			echo'<a href="../templates/administradores.html">Regresar</a>';
			return;
	}
	//validación en php
	$a=((preg_match('/^[A-z\s]{4,28}$/i', $nom)))?true:false;
	$b=((preg_match('/^[A-z\s]{4,28}$/i', $nom)))?true:false;
	$c=((preg_match('/^[A-z\s]{4,28}$/i', $nom)))?true:false;
	$d=((preg_match('/^[0-9]{6}$/', $cuenta)))?true:false;
	if(($a && $b && $c && $d)) //si pasa por las REGEX entonces..
	{
		if(mysqli_num_rows($nombreQ)==0) //si hay 0 registros con ese no. de cuenta...
		{
			$insertar=mysqli_query($conexion,'INSERT INTO USUARIO(USUARIO_NO,USUARIO_TIPO) VALUES("'.$cuenta.'","P");');
			//inserta nombre a DB en profesor
			$insertnom=mysqli_query($conexion,'INSERT INTO PROFESOR(PROFESOR_NOMBRE) VALUES("'.$nom.'","'.$app.'","'.$apm.'");');
			//inserta no. de cuenta en profesor
			$insert=mysqli_query($conexion,'INSERT INTO PROFESOR(USUARIO_NO) VALUES("'.$cuenta.'");');
			//comprueba que haya insertado a la DB
			if($insertnom)
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
?>