	<form class="form" action="{{url($action)}}" method="POST">
			@csrf
		  <div class="form-group">
		    <label for="idInput">ID</label>
		    <input id="idInput" class="form-control" type="text" placeholder="0" readonly>
		  </div>
		  <div class="form-group">
		    <label for="nombreInput">NOMBRE</label>
		    <input type="text" name="nombre" class="form-control" id="nombreInput" aria-describedby="emailHelp" placeholder="Nombre">
		  </div>
		  <button type="submit" class="btn btn-primary">GUARDAR</button>
	</form>