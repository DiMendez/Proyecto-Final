<?php
	
	$conexion=mysqli_connect('localhost','root','','juego');//Por Bruce: IMPORTANTE si lo van a probar aqui la BD se llama juego
	//Por Bruce la BD solo contempla el campo de Cuenta y Contraseña(HSP) omitiré $_POST('name') en la querys
	$nombre=$_POST['name'];
	$cuenta=$_POST['cuenta'];
	$contra=$_POST['contra'];
	//$bd=array('Alma','Kevin','Diana'); //se supone que será en base de datos
	//$bdcuenta=array('315153406','3123457');
	//$bdcontra=array('holaitsme');
	$nombreQ=mysqli_query($conexion,'SELECT USUARIO_NO,USUARIO HSP FROM USUARIO WHERE USUARIO_NO="'.$cuenta.'";');
	function oh()
	{
			echo'<br/>';
			echo'<a href="registro.html">Regresar</a>';
			return;
	}
	//Aquí va otra validación porque #Angie dijo que nunca sobran validaciones
		((preg_match('/^[A-z\d_]{4,28}$/i', $nombre)))?$a=true:$a=false;
		((preg_match('/^[0-9]{6,9}$/', $cuenta)))?$b=true:$b=false;
		((in_array($nombre,$bd)))?$c=false:$c=true; //aquí estarán condicionales para ver si existe en la DB
		((in_array($cuenta,$bdcuenta)))?$d=false:$d=true;
		((in_array($contra,$bdcontra)))?$e=false:$e=true;
		if(($a && $b))
		{
			if(mysqli_num_rows($nombreQ)==0) //si no existía ninguna de las tres, entonces se registra
			//Por Bruce añadi la condicional que realiza el registro si las filas de la query son 0
				//insertar para registrar
			{
				echo'registro concluido exitosamente '.$nombre;
				echo'<br/><a href="principal.html">Ingresar</a>';
			}
			elseif(!($c))
			{
				echo'Ese nombre ya existe';
				oh();
			}
				elseif(!($d))
				{
					echo'La cuenta ya existe';
					oh();
				}
					elseif(!($e))
					{
						echo'Prueba con otra contraseña';
						oh();
					}
		}
?>