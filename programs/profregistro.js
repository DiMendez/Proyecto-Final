$(document).ready(function(){
	$("#ok").hide();
		$("#form").validate({
        rules: {
            nom: { required: true,lettersonly: true, minlength:4, maxlength:20},
            app: { required: true,lettersonly:true, minlength: 4, maxlength:20},
			apm:{ required: true, lettersonly:true,minlength: 4, maxlength:20},
			cuenta:{required:true, minlength:6, maxlength:6,digits:true},
			contra:{ required: true,minlength:8, maxlength:32 },
			contra2:{required:true, minlength:8, maxlength:32,equalTo:"#contra"},
        },
        messages: {
            nom: "Debe introducir su nombre con mínimo cuatro letras sin acentos o caracteres especiales.",
            app: "Debe introducir apellido con mínimo cuatro letras sin acentos o caracteres especiales.",
			apm:"Debe introducir apellido válido",
			cuenta:"Debe de ser una cuenta con seis números",
			contra:"Su contraseña con caracteres especiales permitidos como #_., mínimo 8, máximo 32", //mesajes que aparecen si no se cumple con requisitos
			contra2:"No coincide su contraseña"
        },
        submitHandler: function(form){
            var dataString = 'nom='+$('#nom').val()+'&cuenta='+$('#cuenta').val()+'&app='+$('#app').val()+'&apm='+$('#apm').val()+'&contra='+$('#contra').val();
            $.ajax({
                type: "POST",
                url:"../programs/profregistro.php",
                data: dataString,
                success: function(data){
                    $("#ok").html(data);
                    $("#ok").show();
                    $("#form").hide();
                }
            });
			alert("formulario enviado");
        }
    });
	
});