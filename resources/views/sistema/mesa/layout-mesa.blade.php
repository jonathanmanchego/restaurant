@extends('layout.sistema')
@section('content')
<div class="container">
    <div class="row">
		
		<div class="col-md-5">
		    <label>Ambiente:</label>&nbsp;
		    <select class="form-control" name="ambiente" id="selectAmbiente" onchange="cambiarCanvas()">
				@foreach ($data as $key => $ele) 
					<option value="{{$ele->id}}/{{$ele->nombre}}" >{{$ele->nombre}}</option>
				@endforeach
		    </select>
		</div>
			{{--<div class="col-md-3 ">
				<button type="button" class="btn btn-primary form-control" style="padding-bottom: 3.2rem;" onclick="cambiarCanvas({{$ele->id}})">{{$ele->nombre}}</button>
			</div>--}}
		<div class="col-md-3">
			<label>&nbsp;</label>
			<a class="btn btn-primary form-control" href="{{ url('/sistema/ambiente') }}" role="button">Agregar Ambiente</a>
		</div>
		<div class="col-md-4">
			<label>&nbsp;</label>
			<button onclick="saveCoords()" class="btn btn-success form-control">Guardar <label id="ambienteNombre"></label></button>
		</div>
    </div>
</div><br><br>
<div id="nombre_ambiente"></div>
	<canvas width="800" height="550" id="lienzo"></canvas><br>	
@endsection
<script src="{{url('/js/customs/mesa/layout.js')}}"></script>