@extends('layout.sistema')
@section('content')
	<div class="container-crud">
	<form class="form" action="{{url('/sistema'.$action)}}" method="POST">
			@csrf
		    @method('PUT')
			@foreach ($headers as $head)
			  	<div class="form-group">
				    <label for="{{$head}}Input">{{strtoupper($head)}}</label>
				    <input id="{{$head}}Input" class="form-control" type="text" name="{{$head}}" placeholder="{{$head}}" @if ($head == 'id') readonly @else {{""}} @endif value="{{$data->$head}}">
				</div>
			@endforeach
		  	<div class="form-group">
		    <label for="unidadMedida">Unidad de Medida</label>
		    <select class="form-control" name="unidadMedida" id="unidadMedida">
		    	<option value="{{$data->unidad->id}}">{{$data->unidad->nombre}}</option>
				@foreach ($medidas as $unidad)	 
					<option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
				@endforeach
		    </select>
		</div>

		  <button type="submit" class="btn btn-primary">GUARDAR</button>
		  <button form="del" type="submit" class="btn btn-danger">ELIMINAR</button>
	</form>
	<form id="del" action="{{url('/sistema'.$action)}}" method="POST">
		@csrf
		@method('DELETE')
	</form>
</div>

@endsection