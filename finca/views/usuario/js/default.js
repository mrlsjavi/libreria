$(document).ready(function(){

	$("#setnombre").click(function(){
		var enviar = {nombre: "javier"}
		$.ajax({
			type: 'POST',
			data: enviar,
			url: 'usuario/setVariable/javier/javi',
			success: function(res){
				alert(res);
			}

		});


	});

	$("#getnombre").click(function(){
		$.ajax({
			url:"usuario/getVariable/nombre",
			success: function(res){
				alert(res);
			}
		});
	});	


});

