@extends('layout.sistema')
@section('content')
	<div class="container-crud">
		@if ($errors->any())
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="w-100">
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
					<label for="categoriaInput">CATEGORIA</label>
					<select name="categoria" class="form-control" id="">
						@foreach ($categorias as $cate)
							<option value="{{$cate->id}}">{{$cate->nombre}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group row">
					<div class="col-md-5">
					    <label for="ImagenInput">IMAGEN</label>
					    <input id="ImagenInput" class="form-control-file" type="file" name="image" >
					</div>
					<div class="col-md-5">
						@isset ($data->imagen)
							<img src="{{url('/uploads/'.$data->imagen)}}" alt="{{$data->nombre}}">
						@endisset
					</div>
				</div>
				<div class="form-group row">
				    <div class="col-md-6">
				    	<label for="VideoInput">VIDEO</label>
				    	<input id="VideoInput" class="form-control-file" type="file" name="video" >
				    </div>
				    <div class="col-md-5">
						@isset ($data->video)
							<img src="{{url('/uploads/'.$data->video)}}" alt="{{$data->nombre}}">
						@endisset
				    </div>
				</div>
				<div class="form-group">
					<label>ESTADO DEL PRODUCTO</label>
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" type="radio" id="boxEliminado" name="eliminado" value="0" @if ($data->eliminado == 0) checked @endif>
					  	<label class="form-check-label" for="boxEliminado">Inactivo</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="box2Eliminado" name="eliminado" value="1" @if ($data->eliminado == 1) checked @endif>
					  	<label class="form-check-label" for="box2Eliminado">Activo</label>
					</div>
				</div>
				<div class="form-group">
				    <label for="FechaInput">FECHA VALIDEZ</label>
				    <input id="FechaInput" class="form-control" type="date" name="fecha_validez" value="{{$data->fecha_validez}}" >
				</div>
			  {{-- <div class="form-group">
			    <label for="idInput">ID</label>
			    <input id="idInput" class="form-control" type="text" readonly value="{{$data->id}}">
			  </div>
			  <div class="form-group">
			    <label for="nombreInput">NOMBRE</label>
			    <input type="text" name="nombre" class="form-control" id="nombreInput" aria-describedby="emailHelp" value="{{$data->nombre}}" placeholder="Nombre">
			  </div> --}}
			  <button type="submit" class="btn btn-primary">GUARDAR</button>
			  <button form="del" type="submit" class="btn btn-danger">ELIMINAR</button>
			</form>
			<form id="del" action="{{url('/sistema'.$action)}}" method="POST">
				@csrf
				@method('DELETE')
			</form>
			<div class="w-75">
				<button id="" type="button" class="btn btn-primary btn-flat w-50" data-toggle="modal" data-target="#modal-datos" ><span class="fa fa-list"></span> AÑADIR INGREDIENTES</button>
				<table class="table table-hover">
			  		<thead class="thead-dark" style="background-color: #343a40;color:#fff">
						<tr>
							@foreach ($datos_aux['headers'] as $head)
			        			<th  scope="col">{{$head}}</th>
			   				@endforeach
			   					<th scope="col">ELIMINAR</th>
						</tr>
			  		</thead>
				  	<tbody id="ingreProducto">
				  		@if (count($data->ingredientes) != 0)		
						    @foreach ($data->ingredientes as $key => $item)
								<tr id="ingre{{$key}}">
									<td>{{$item->id}}</td>
									<td>{{$item->nombre}}</td>
									<td>0</td>
									<td>{{$item->precio_compra}}</td>
									<td>
						                <button onclick="javascript:removeIngrediente({{$item->id}},{{$key}})" type="button" class="btn btn-success btn-agregarprod">
						                    <span class="fa fa-minus"></span>
						                </button>
							        </td>
								</tr>
							@endforeach
					  	@endif
				  	</tbody>
				</table>
			</div>
		</div>
	</div>
	@include('sistema.producto.modal_datos')
<script src="{{url('/js/customs/producto/script.js')}}"></script>
@endsection