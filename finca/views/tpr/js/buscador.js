$(document).ready(function(){
	var root = document.location.hostname;
	var db_ac 	= "";
	var tb_ac 	= "";
	//
	var activador = [];
	//
	var destino 	= "";
	puntero_act = "";
	$("body").on("click",".boton_buscar",function(){
		var padre 		= $(this).parent().parent();
		var super_padre = padre.parent().parent();
		activador[activador.length] = padre.children(".dato").children(".data");
		obj		= padre.attr("obj");
		super_padre.append('<div class="pantalla_extra" act="si"></div>');
		pantalla_activa = super_padre.children(".pantalla_extra");
		pantalla_activa.css("z-index", (activador.length+1));
		pantalla_activa.css("margin-top", "-"+super_padre.height()+"px");
		pantalla_activa.css("margin-left", "3%");
		pantalla_activa.css("width", "90%");
		pantalla_activa.css("padding", "2%");
		pantalla_activa.css("background", "white");
		pantalla_activa.css("box-shadow", "0 0 10px rgba(40,40,40,0.5)");
		pantalla_activa.css("position", "absolute");
		
		
		
		
		
		$.ajax({
			type: 'POST',
			//url: 'http://'+root+'/'+obj+'/view/search',
			url: 'tpr/buscar',
			success: function(res){
				pantalla_activa.last().html(res);
			}
		});
	});

	function set_values_form(obj){
		$.each(obj, function(puntero, valor){
			$("#"+puntero).val()
		});
	}
	$("body").on("click",".boton_eliminar",function(){
		$(this).parent().remove();
	});
	$("body").on("click",".contenedor_buscador .cerrar", function(){
		$(this).parent().html("");
		$(".contenedor_buscador").css("display","none");
	});
	$("body").on("click",".boton_ejecutar_busqueda", function(){
		form_activador = $(this).parent();
		$.ajax({
			type: 'POST',
			url: 'http://'+root+'/modulos/'+tb_ac+'/controlador.php',
			dataType: 'json',
			data: {tb: tb_ac, texto: $(".txt_buscar").val(), acc: '4'},
			success: function(res){
				if(res.cod==1){
					form_activador.html("");
					form_activador.html(crear_lineas_busqueda(res.msj))
					
				}else 
					alert(res.mensaje);
			}
		});
	});
	$("body").on("change",".codigo_foraneo",function(){
		traer_titulo_foraneo($(this));
	});
	function traer_titulo_foraneo(puntero){	
		obj 				= puntero.parent().parent().attr("obj");
		var texto_ac 		= puntero.parent().children(".descripcion-codigo");
		data_json 			= JSON.stringify({id: puntero.val()})
		$.ajax({
			type: 'POST',
			url: 'http://'+root+'/'+obj+'/process',
			dataType: 'json',
			data: {values: data_json, acc: '4'},
			success: function(res){
				if(res.cod==1 && res.msj !=""){
					json = $.convert_string_json(res.msj);
					texto_ac.html(json[0]['titulo']);
				}else if(res.cod==0){
					alert(res.mensaje);
				}		
			}
		});
	}
	$("body").on("click",".linea_busqueda", function(){
		//alert($(this).parent().parent().attr("act"));
		if(activador[(activador.length-1)].attr('acc')!='1'){
			if(activador[(activador.length-1)].attr('id')=="id"){
				$(this).children('label').each(function(){
					$("#"+($(this).attr("class"))).val($(this).html());
					$("#"+($(this).attr("class"))).change();
				});
			}else{
				if($(this).parent().parent().attr("act")=="si"){
					activador[(activador.length-1)].val($(this).children('.id').html());
					activador[(activador.length-1)].parent().children(".descripcion-codigo").html($(this).children(".titulo").html())
				}else{
					var codigo 		= $(this).children(".cod").html();
					var descripcion = $(this).children(".texto").html();	
				}
			}
		}else{
			activador[(activador.length-1)].val($(this).children('.id').html());
			activador[(activador.length-1)].parent().children(".descripcion-codigo").html($(this).children(".titulo").html())
		}
		activador.splice((activador.length-1))
		$(this).parent().parent().remove();
	});

	$("body").on("change",".codigo_principal",function(){
		traer_datos_formulario($(this).parent().parent().parent());
	});
	
	function traer_datos_formulario(puntero){
		arr_datos 	= [];
		tb_ac 		= puntero.attr("tb");
		cod 		= puntero.children(".form-group").children(".con_codigo").children(".codigo").val()
		
		puntero.children(".form-group").each(function(){
			dato = $(this).children(".dato").children(".data"); 
			if(dato.length)
				arr_datos.push(dato.attr("id"));
		});
		
		$.ajax({
			type: 'POST',
			url: 'http://'+root+'/modulos/'+tb_ac+'/controlador.php',
			dataType: 'json',
			data: {estructura: arr_datos, codigo: cod, acc: '6'},
			success: function(res){
				if(res.codigo==1){
					mensaje = res.mensaje[0];
					puntero.children(".form-group").each(function(){
						if($(this).children(".dato").children(".data")){
							dato = $(this).children(".dato").children(".data"); 
							dato.val(res.mensaje[0][dato.attr("id")]) ;	
						}
					});
					if(typeof(mensaje['foraneo_multiple']) != "undefined"){
						for(j=0;j<mensaje['foraneo_multiple'].length;j++){
							tb = mensaje['foraneo_multiple'][j]['tb'];
							puntero.children(".foranea-multiple").each(function(){
								if($(this).attr("tb")==tb){
									foranea = $.map(mensaje['foraneo_multiple'][j], function(value, index) {
    												return [value];
    											});
									for(i=0;i<(foranea.length-1);i++){
										agregar_linea_foranea($(this),foranea[i][0]);
									}		
								}
							});	
						}
					}if(typeof(mensaje['archivo'])!= "undefined"){
						$("#url_archivo").val(mensaje['archivo']);
						$("#vista_imagen").attr("src",mensaje['archivo']);
					}	
					puntero.children(".form-group").each(function(){
						if($(this).children(".linea-foranea").children(".codigo_foraneo").length){
							traer_titulo_foraneo($(this).children(".linea-foranea").children(".codigo_foraneo"));
						}
					});
				}else{
					alert(res.mensaje);
				}
			}
		});
	}
	$("body").on("click",".agregar_linea_foranea",function(){
		var padre = $(this).parent();
		agregar_linea_foranea(padre);
	});
	function agregar_linea_foranea(puntero,codigo){
		var codigo = typeof codigo !== 'undefined' ? codigo : "";
		$.ajax({
			type: 'POST',
			url: 'http://'+root+'/esqueletos_generales/linea_foranea.html',
			success: function(res){
				puntero.append(res);
				if(codigo != ""){
					puntero.children(".linea-foranea-multiple").last().children(".codigo_foraneo").val(codigo);
					traer_titulo_foraneo(puntero.children(".linea-foranea-multiple").last().children(".codigo_foraneo"));	
				}
			},error: function(){
				alert("error en pagina referencia");
			}
		});
	}
});