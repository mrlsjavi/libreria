<h1>Sistema de Reservas</h1>
<div class="cf form-horizontal" obj="Item" acc="1">
	<div class="form-group">
		<label class="col-sm-2 control-label">Nombre para reserva: </label>
		<div class="col-sm-10 dato">
			<input type="text" class="data form-control" id="reserva">
		</div>
	</div>
	<div class="form-group" obj="Restaurante" >
		<label class="col-sm-2 control-label">Seleccione restaurante: </label>
		<div class="linea-foranea dato col-sm-10">
			<input type="text" class="data codigo codigo_foraneo col-sm-2" id="restaurante">
			<label class="descripcion-codigo control-label col-sm-8"></label>
			<div class="boton_buscar btn btn-default col-sm-1">Buscar</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Area mesa: </label>
		<div class="col-sm-10 dato">
			<select class="data form-control" id="area">
				<option id="2" value="0">No Fumador</option>
				<option id="1" value="1">Fumador</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Cantidad de personas: </label>
		<div class="col-sm-10 dato">
			<input type="number" class="data form-control" id="personas">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Hora: </label>
		<div class="col-sm-10 dato">
			<input type="time" class="data form-control" id="hora"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Fecha: </label>
		<div class="col-sm-10 dato">
			<input type="date" class="data form-control" id="fecha">
		</div>
	</div>
	<div class="boton_ejecutar btn btn-primary btn-lg btn-block">
		Ejecutar
	</div>

	

</div>	