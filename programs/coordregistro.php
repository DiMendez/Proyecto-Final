<?php
	$nom=$_POST['nom'];
	$app=$_POST['app'];
	$apm=$_POST['apm'];
	$cuenta=$_POST['cuenta'];
	$em=$_POST['em'];
	echo $nom.$app.$apm.$cuenta.$em;
	//va a hacer lo mismo que registro.php, va a buscar en la DB si ya existe o no, si no existe, entonces se registra
	echo'<a href="../templates/administradores.html">Regresar</a>';
?>