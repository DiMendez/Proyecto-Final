$("#materia").change(function(){
	$.ajax({
		url:"../programs/unidades.php",
		data:{
			materia:$("#materia").val()
		},
		type:"POST",
		dataType:"text",
		success:function(data){
			console.log("ajax funciona");
			$("#mat-uni").append(data);
		}
	});
	$(this).append();
});