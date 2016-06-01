<?php
	
	$conexion=mysqli_connect('localhost','root','','PROFIN');
	//Por Bruce la BD solo contempla el campo de Cuenta y Contraseña(HSP) omitiré $_POST('name') en la querys
	mysqli_set_charset($conexion,"utf8");
	$nombre=mysqli_real_escape_string($conexion,$_POST['name']); //evita inyecciones sql
	$cuenta=mysqli_real_escape_string($conexion,$_POST['cuenta']);
	$contra=$_POST['contra'];
	$grado=mysqli_real_escape_string($conexion,$_POST['grado']);
	$nombreQ=mysqli_query($conexion,'SELECT USUARIO_NO,USUARIO_HSP FROM USUARIO WHERE USUARIO_NO="'.$cuenta.'";');
	
	function oh()
	{
			echo'<br/>';
			echo'<a href="registro.html">Regresar</a>';
			return;
	}
	
	//Aquí va otra validación porque #Angie dijo que nunca sobran validaciones
		$a=(preg_match('/^[A-z\d\ÁÉÍÓÚáéíó]{4,28}$/i', $nombre)==1)?true:false;
		$b=(preg_match('/^[0-9]{9}$/', $cuenta)== 1)?true:false;
		$c=(preg_match('/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i' ,$contra)==1)?true:false;
		if(($a && $b &&$c))
		{
			if(mysqli_num_rows($nombreQ)==0) 
			//Por Bruce añadí la condicional que realiza el registro si las filas de la query son 0
			
			{
				//inserta número de cuenta, contraseña y tipo de usuario en la tabla usuario
				$contrasenia=hash("sha256",$contra);
				$insertar=mysqli_query($conexion,'INSERT INTO USUARIO(USUARIO_NO,USUARIO_HSP,USUARIO_TIPO) VALUES("'.$cuenta.'","'.$contrasenia.'","J");');
				//Inserta en la tabla alumno el nombre, el no. de cuenta y el grado
				$inalum=mysqli_query($conexion,'INSERT INTO ALUMNO(USUARIO_NO,ALUMNO_NOMBRE,GRADO,ALUMNO_BUENAS,ALUMNO_PUNT) VALUES("'.$cuenta.'","'.$nombre.'","'.$grado.'",0,0);');
				if($insertar)
				{
					echo'Registro concluido exitosamente, '.$nombre;
					echo'<br/><a href="principal.html">Ingresar</a>'; //Lo regresa a la página principal, para mayor seguridad
				}
				else 
					echo 'Algo falló con el registro,no se concluyó';
			}
			else 
			{
				echo 'Este usuario ya existe';
				oh();
			}
		}
?>
