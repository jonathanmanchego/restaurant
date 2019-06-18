<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	<link rel="stylesheet" type="text/css" href="{{url('/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/css_boot/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/sistema/app.css')}}">
</head>
<body>
	<div class="wrapp">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand logo-space">
				<img src="{{url('/img/logoPrincipal.png')}}" alt="" width="15%">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="{{url('/')}}" class="nav-link">INICIO</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="{{url('/productos')}}">PRODUCTOS</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('/articulos')}}">ARTICULOS</a></li>
					<li class="nav-item"><a class="nav-link" href="{{url('/pedido')}}">PEDIDO</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DATOS ADICIONALES</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a href="{{url('/sistema/zona')}}" class="dropdown-item">Zona</a>
							<a href="{{url('/sistema/tipousuario')}}" class="dropdown-item">Tipo Usuario</a>
							<a href="{{url('/sistema/tipodocumento')}}" class="dropdown-item">Tipo Documento</a>
						</div>
					</li>	
				</ul>
			</div>
		</nav>
		<div class="wrapp-content">
			<div class="content">
				@section('content')
					@show
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="/js/js_boot/bootstrap.min.js"></script>
</body>
</html>