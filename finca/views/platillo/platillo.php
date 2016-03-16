<h1>Administracion de Platillos</h1>
<div class="cf form-horizontal" obj="platillo" acc="ACCION-FORMULARIO">
	
	<div class="form-group" obj="platillo" >
		<label class="col-sm-2 control-label">Codigo: </label>
		<div class="col-sm-10 con_codigo dato">
			<input type="number" class="data codigo codigo_principal col-sm-2" id="id" >
			<div class="boton_buscar btn btn-default col-sm-1">Buscar</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Titulo: </label>
		<div class="col-sm-10 dato">
			<input type="text" class="data form-control" id="titulo">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Es platillo principal: </label>
		<div class="col-sm-4 dato">
			<select class="data form-control" id="principal">
				<option value="1">Si</option>
				<option value="0">No</option>
			</select>
		</div>
	</div>
	<div class="boton_ejecutar btn btn-primary btn-lg btn-block">
		Ejecutar
	</div>
</div>	