	<form class="form" action="{{url($action)}}" method="POST">
			@csrf
		  <div class="form-group">
		    <label for="idInput">ID</label>
		    <input id="idInput" class="form-control" type="text" readonly value="{{$data->id}}">
		     @method('PUT')
		  </div>
		  <div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input type="text" name="nombre" class="form-control" id="nombreInput" aria-describedby="emailHelp" value="{{$data->nombre}}" placeholder="Nombre">
		  </div>
		  <button type="submit" class="btn btn-primary">GUARDAR</button>
		  <button form="del" type="submit" class="btn btn-danger">ELIMINAR</button>
	</form>
	<form id="del" action="{{url($action)}}" method="POST">
		@csrf
		@method('DELETE')
	</form>
