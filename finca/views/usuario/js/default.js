$(document).ready(function(){

	

	
	$("#btn_guardar").click(function(){
		
		var datos = {nombre: $("#txt_nombre").val(), apellido: $("#txt_apellido").val()};
		var datos_json = JSON.stringify(datos)
		
		enviar = {values: datos_json};

		$.ajax({
			type: "POST",
			data: enviar,
			url:"usuario/guardar",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}
				
			}

		});
	});

	$("#btn_operar").click(function(){


var datos = [];

datos.push({'usuario':'a', 'hora':'1', 'entrada':'0'});
datos.push({'usuario':'b', 'hora':'2', 'entrada':'1'});



		var datos_json = JSON.stringify(datos)
		
		
	enviar = {values: datos_json};
console.log(enviar);
			$.ajax({
			type: "POST",
			data: enviar,
			url:"usuario/marcaje",
			dataType:"json",
			success: function(res){
				if(res.cod ==1){
					alert(res.msj);
				}
				else{
					alert("ha ocurrido un problema");
				}
			}

		});

	});


});

