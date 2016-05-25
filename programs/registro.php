<?php
	
	$conexion=mysqli_connect('localhost','root','','PROFIN');//Por Bruce: IMPORTANTE si lo van a probar aqui la BD se llama juego
	//Por Bruce la BD solo contempla el campo de Cuenta y Contraseña(HSP) omitiré $_POST('name') en la querys
	$nombre=$_POST['name'];
	$cuenta=$_POST['cuenta'];
	$contra=$_POST['contra'];
	$nombreQ=mysqli_query($conexion,'SELECT USUARIO_NO,USUARIO_HSP FROM USUARIO WHERE USUARIO_NO="'.$cuenta.'";');
	function oh()
	{
			echo'<br/>';
			echo'<a href="registro.html">Regresar</a>';
			return;
	}
	//Aquí va otra validación porque #Angie dijo que nunca sobran validaciones
		$a=((preg_match('/^[A-z\d_]{4,28}$/i', $nombre)))?true:false;
		$b=((preg_match('/^[0-9]{6,9}$/', $cuenta)))?true:false;
		if(($a && $b))
		{
			if(mysqli_num_rows($nombreQ)==0) 
			//Por Bruce añadí la condicional que realiza el registro si las filas de la query son 0
			
			{
				//inserta en BD
				$insertar=mysqli_query($conexion,'INSERT INTO USUARIO(USUARIO_NO,USUARIO_HSP,USUARIO_TIPO) VALUES("'.$cuenta.'","'.$contra.'","J");');
				if($insertar)
				{
					echo'registro concluido exitosamente '.$nombre;
					echo'<br/><a href="principal.html">Ingresar</a>';
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