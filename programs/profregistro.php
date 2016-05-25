<?php
	$nom=$_POST['nom'];
	$app=$_POST['app'];
	$apm=$_POST['apm'];
	$cuenta=$_POST['cuenta'];
	echo $nom.$app.$apm.$cuenta;
	//va a hacer lo mismo que registro.php, va a buscar en la DB si ya existe o no, si no existe, entonces se registra
	echo'<a href="../templates/coordinadores.html">Regresar</a>';
?>