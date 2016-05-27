<?php
if(isset($_POST['materia']) && isset($_POST['unidades']))
{
	$con=mysqli_connect("127.0.0.1","root","","PROFIN");
	$materia=mysqli_real_escape_string($con,$_POST['materia']);
	$arrUnidades=explode(' ',$_POST['unidades']);
	$query="SELECT * FROM PREGUNTAS WHERE PREGUNTA_XCONFIRMAR='SI' AND MATERIA_NO='".$materia."' AND UNIDAD_NO='".$arrUnidades[0]."'";
	
	for($i=1;$i<count($arrUnidades);$i++)
		$query=$query." OR UNIDAD_NO='".$arrUnidades[$i]."'";
	$consul=mysqli_query($con,$query.';');
	
	$numero=mysqli_num_rows($consul);
	for($n=0;$n<$numero;$n++)
		$arrPreg[]=mysqli_fetch_assoc($consul);
	if(isset($_POST['']) && isset(['']))
	{
		
	}
	
	if($buena===true)
	{
		$azar=rand(0,$numero-1);
		$pregunta=$arrPreg[$azar];
		echo "<div>".$pregunta['PREGUNTA_NOMBRE']."</div>
		<form id='pregunta'>
			<input type='radio' name='opciones' value='1'/>".$pregunta['PREGUNTA_OPCION1']."<br/>
			<input type='radio' name='opciones' value='2'/>".$pregunta['PREGUNTA_OPCION2']."<br/>
			<input type='radio' name='opciones' value='3'/>".$pregunta['PREGUNTA_OPCION3']."<br/>
			<input type='radio' name='opciones' value='4'/>".$pregunta['PREGUNTA_OPCION4']."<br/>
			<input type='submit' value='Prueba'/><br/>
			<input type='hidden' name='respuesta' id='resp-c' value='".$pregunta['PREGUNTA_RESPUESTA']."'/>
			<input type='hidden' name='materia' id='mat-ronda' value='".$materia."'/>
			<input type='hidden' name='unidades' id='uni-ronda' value='".$_POST['unidades']."'/>
			
		</form>";
	}
}
else
	echo '<p>Hubo un error</p><a href="inicio.php">Regresa</a>';
?>