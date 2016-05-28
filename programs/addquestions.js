$("#materia").change(function(){
	$.ajax({
		url:"../programs/addquestions.php",
		data:{
			materia:$("#materia").val()
		},
		type:"POST",
		dataType:"text",
		success:function(data){
			console.log("ajax funciona");
			$("#unidad-field").html(data);
		}
	});
});