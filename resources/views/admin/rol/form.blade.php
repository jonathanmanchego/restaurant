<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="col-lg-3 control-label requerido">Descripción</label>
    <div class="col-lg-8">
    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion', $data->descripcion ?? '')}}" required/>
    </div>
</div>