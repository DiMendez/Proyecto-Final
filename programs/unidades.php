<?php
if(isset($_POST['materia']))
{
	$conexion=mysqli_connect("127.0.0.1","root","","PROFIN");
	$query='SELECT UNIDAD_NO,UNIDAD_NOMBRE FROM UNIDAD WHERE MATERIA_NO="'.$_POST['materia'].'";';
	$result=mysqli_query($conexion,$query);
	$html='<h4>¿Qué unidades quieres?</h4>';
	for($x=0;$x<mysqli_num_rows($result);$x++)
	{
		$y=$x+1;
		$resultArray=mysqli_fetch_assoc($result);
		$numero=$resultArray["UNIDAD_NO"];
		$nombre=$resultArray["UNIDAD_NOMBRE"];
		$nuevo='<label>'.$numero.'.- '.$nombre.'</label><input type="checkbox" name="unidad-'.$y.'" value="'.$numero.'"/><br/>';
		$html=$html.$nuevo;
	}
	mysqli_close($conexion);
	echo $html;
}
?>