<div class="form-group">
	<label for="nombre" class="col-sm-3 control-label requerido">Nombre</label>
	<div class="col-sm-8">
	<input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" required/>
	</div>
</div>
<div class="form-group">
	<label for="url" class="col-sm-3 control-label requerido">URL</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="url" id="url" value="{{old('url')}}" required/>
	</div>
</div>
<div class="form-group">
	<label for="icono" class="col-sm-3 control-label">Icono</label>
	<div class="col-sm-8">
		<input type="text" class="form-control" name="icono" id="icono" value="{{old('icono')}}" />
	</div>
	<div class="col-sm-1">
		<span id="mostrar-icono" class="fa fa-fw {{old('icono')}}"></span>
	</div>
</div>