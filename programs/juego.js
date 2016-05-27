$("#escoger").submit(function(e){
	e.preventDefault();
	$.ajax({
		url:"../programs/juegoAjax.php",
		data:{
			materia:$("#mat-ronda").val(),
			unidades:$("#uni-ronda").val()
		},
		type:"POST",
		dataType:"text",
		success:function(data)
		{
			$("#juego").html(data);
		}
	});
});

$("#pregunta").submit(function(e){
	e.preventDefault();
	$.ajax({
		url:'../programs/juegoAjax.php',
		type:"post",
		dataType:"text",
		data:{
			respAct:$("input[name:opciones]")
			materia:$("#mat-ronda").val(),
			unidades:$("#uni-ronda").val(),
			respuesta:$("#resp-c").val(),
			
		},
		success:function(data){
			
		}
	});
});