<!--Por Kevin. Validación por AJAX desde principal.html-->
<?php
$contraBD='hola';

if(isset($_POST['usuario']) && isset($_POST['contra']))
{
	//inserte query
	if($_POST['usuario']=='315294378')		//si existe usuaio en la BD
	{
		if($contraBD==$_POST['contra'])
			echo 'pasa';
		else
			echo 'incorrecta';
	}
	else 
		echo 'no hay';
}
else 
	echo 'completa';
?>