$(document).ready(function(){
	var root = document.location.hostname;
	var path = document.location.href;
	path = path.split('?');
	variables = path[1];
	get = extraer_varibles_get(variables);
	set_acc(get);
	function set_acc(get){
		$(".cf").attr('acc', get['acc']);
	}
	function extraer_varibles_get(variables){
		resultado = [];
		if (variables != null){
			if(variables.indexOf('&')>0){
				variables = variables.split('&');
				for(i = 0; i<variables.length;i++){
					par = variables[i].split('=');
					resultado[par[0]]= par[1];
				}
			}else{
				par = variables.split('=');
				resultado[par[0]] = par[1];
			}
		}
		return resultado;
	}
	acc 		= '0';
	tb_activo 	= ''; 
	pt 			= $("#pt").attr("pat");
	$(".opcion_abc").click(function(){
		acc = $(this).attr("acc");
		$.traer_vista_formulario();
	});

	$("body").on("click",".boton_ejecutar", function(){
		//alert("entro javier morales");
		cf	= $(this).parent();
		obj	= cf.attr('obj');
		acc = cf.attr("acc");
		var dt_json = JSON.stringify($.extraer_datos_formulario(cf));
		enviar 	= {values: dt_json, acc: acc};	
		$.ajax({
			type: 'POST',
			data: enviar,
			//url: 'http://'+root+'/'+obj+'/process',
			url:'reservacion/process',
			dataType: 'json',
			success: function(res){
				//alert(res);
				if(res.cod==1){
					if(acc == 4){
						cf.html("");
						lineas = crear_lineas_busqueda(res.msj)
						if(lineas==""){
							alert("No hay registros para su busqueda");
							cf.parent().remove();
						}else{
							cf.html(lineas);	
						}	
					}else{
						alert(res.msj);
						$("input").val("");
						$("textarea").val("");
						//cf.parent().remove();	
					}
					
				}else{
					alert(res.msj);
					//alert(res.cod);

				}

				//alert(res.cod);
				//alert(res.msj);
					
					//alert("pa");
			}
		});

		//alert("despues del ajax");

	});
	
	function crear_lineas_busqueda(obj){
		encabezado = "";
		txt_linea = "";
		json = $.convert_string_json(obj);
		for(i=0; i< json.length ; i++){
			txt_linea = txt_linea + "<div class=\"linea_busqueda\">";
			encabezado = "<div class=titulo_linea_busqueda>";
			$.each(json[i], function(puntero, valor){
				encabezado += "<label>"+puntero+"</label>"; 
				txt_linea = txt_linea + "<label class="+(puntero.toLowerCase()).replace(/ /g, "_")+">"+valor+"</label>";
			});
			txt_linea += "</div>";
		}
		if(txt_linea != "")
			txt_linea = encabezado+"</div>"+txt_linea;
		return txt_linea;
	}
	
	$("body").on("click",".boton_ejecutar_form_archivo", function(){
		alert("no va a entrar ");

		cf			= $(this).parent();
		tb_activo 	= cf.attr('tb');
		formdata = new FormData();
		if(acc=='0')
			acc = cf.attr("acc");
		
		var dt_json = JSON.stringify($.extraer_datos_formulario(cf));
		if(acc==1){
			formdata.append("datos",dt_json);
			formdata.append("acc",acc);
			var inputFileImage = document.getElementById("archivo");
			var file = inputFileImage.files[0];
			formdata.append("archivo",file);
			
		}else{
			if(acc==2){
				formdata.append("datos",dt_json);
				formdata.append("acc",acc);
				var inputFileImage = document.getElementById("archivo");
				var file = inputFileImage.files[0];
				formdata.append("archivo",file);
				formdata.append("codigo",cf.children(".form-group").children(".con_codigo").children(".codigo_principal").val());
				
			}else{
				formdata.append("acc",acc);
				formdata.append("codigo",cf.children(".form-group").children(".con_codigo").children(".codigo_principal").val());
				
			}
		}
		
		$.ajax({
			type: 'POST',
			data: formdata,
			url: 'http://'+root+'/modulos/'+tb_activo+'/controlador.php',
			cache: false,
            contentType: false,
            processData: false,
			dataType: 'json',
			success: function(res){
				if(res.codigo==1){
					alert(res.mensaje);
					cf.parent().html("");
				}else
					alert(res.mensaje);
			}
		});
	});
	
	$.convert_string_json = function(obj){
		obj = obj.replace(/u'/g, "'");
		var json = JSON.stringify(eval("(" + obj + ")"));
		json = JSON.parse(json);
		return json;
	}
	$.traer_vista_formulario = function(){
		$(".formulario").load("http://"+root+"/modulos/"+pt+"/vista.php",{acc: acc},function(){
			if(acc==1)
				$(".codigo_principal").parent().parent().css("display","none");
		});
	}
	$.extraer_datos_formulario = function(formulario){
		arr_datos 	= null;
		arr_datos 	= {};

		contenedor_foranea_multiple = {};
		contenedor_foranea_multiple = null;
		y			= 0;
		formulario.children(".form-group").each(function(){
			if($(this).children(".dato").length){
				dato = $(this).children(".dato").children(".data"); 
				arr_datos[dato.attr("id")] = dato.val();	
			}else if ($(this).children(".linea-foranea-multiple").length){
				foranea_multiple 		= {};
				x 						= 0;
				foranea_multiple['tb'] 	= $(this).attr("tb");
				$(this).children(".linea-foranea-multiple").each(function(){
					if($(this).children(".codigo_foraneo").val()!=""){
						foranea_multiple[x]  = $(this).children(".codigo_foraneo").val(); 
						x++; 
					}
				});
				contenedor_foranea_multiple[y] = foranea_multiple;
				arr_datos['foranea_multiple'] = contenedor_foranea_multiple;
				y++;
			}
		});
		
		return arr_datos;
	}


	

});