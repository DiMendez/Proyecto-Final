/*Por Kevin. Valida los datos de inicio de sesión. Falta checar regex*/

var expregU=new RegExp("^[0-9]{6,9}$");
var expregC=/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i;

//estas dos funciones change habilitan o deshabilitan el boton de submit
$("#usuario").change(function(){

	if(!expregU.test($("#usuario").val()) )
	{
		$("#entrar").prop("disabled",true);
		console.log("us invalid");
	}
	else if(expregC.test($("#contra").val()) )
		$("#entrar").prop("disabled",false);
});
$("#contra").change(function(){
	if(!expregC.test($("#contra").val()) )
	{
		$("#entrar").prop("disabled",true);
		console.log("contra invalida");
	}
	else if(expregU.test($("#usuario").val()) )
		$("#entrar").prop("disabled",false);
});

//valida con ajax antes de hacer submit
$("#formulario").submit(function(event){
	$.ajax({
		url:"../programs/ajax_ingreso.php",
		data:{
			usuario:$("#usuario").val(),
			contra:$("#contra").val()
		},
		type:"POST",
		dataType:"text",
		success:function(data)
		{
			if(data!='pasa')	//en caso de que nombre de usuario o contraseña no existan
			{
				event.preventDefault();
				if(data=='completa')
					console.log("Completa los datos");
					//desplegar un dismisible alert
				else if(data=='no hay')
					console.log("Ese usuario no existe");
				else if(data=="incorrecta")
					console.log("Contraseña incorrecta");
			}
		}
	});
});