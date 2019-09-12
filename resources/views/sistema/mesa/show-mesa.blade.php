@extends('layout.sistema')
@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-5">
			<label>Ambiente:</label>&nbsp;
			<select class="form-control" name="ambiente" id="selectAmbiente" onchange="cambiarCanvas()">
				@foreach ($data as $key => $ele) 
					<option value="{{$ele->id}}">{{$ele->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-3">
			<label>&nbsp;</label>
			<a  class="btn btn-success form-control"  href="{{ url('/sistema/ordenes/agregar') }}">Hacer Pedido</a>
		</div>
    </div>
</div><br><br>
<div id="nombre_ambiente"></div>
	<canvas width="800" height="550" id="lienzo"></canvas><br>
@endsection
<script src="{{url('/js/customs/mesa/view.js')}}"></script>