$(document).ready(function(){

	$("#ok").hide();
	//Aquí valida con ajax,jquery-validate, verifica si de verdad ingresó los datos requeridos, con un mínimo y máximo, en el número
	//de cuenta sólo se aceptan dígitos, seis para los profesores, 9 como máximo para alumnos,después checa si las contraseñas son iguales
	//si todo está bien, aparece un alert con : formulario enviado , y se vuelve a validar en php
		$("#formid").validate({
        rules: {
            name: { required: true, minlength: 4},
            cuenta: { required: true, digits: true, minlength:9,maxlength:9},
			grado:{required:true},
			contra:{ required: true,minlength:8, maxlength:32 },
			contra2:{required:true, minlength:8, maxlength:32,equalTo:"#contra"},
        },
        messages: {
            name: "Debe introducir su nombre con mínimo cuatro letras.",
            cuenta: "Debe introducir su no.de cuenta, sólo números.",
			grado:"Es importante que selecciones un grado",
			contra:"Su contraseña con caracteres especiales, mínimo 8, máximo 32", //mesajes que aparecen si no se cumple con requisitos
			contra2:"No coincide su contraseña"
        },
        submitHandler: function(form){
            var dataString = 'name='+$('#name').val()+'&cuenta='+$('#cuenta').val()+'&grado='+$('#grado').val()+'&contra='+$('#contra').val();
            $.ajax({
                type: "POST",
                url:"../programs/registro.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    $("#formid").hide();
                }
            });
			alert("formulario enviado");
        }
    });
	
});