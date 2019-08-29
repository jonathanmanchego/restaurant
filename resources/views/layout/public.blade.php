<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	{{-- META DE VALIDADCION DE CSRF --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/css_boot/bootstrap.css')}}">
	<script type="text/javascript" src="{{url('/js/js_boot/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{url('/css/app.css')}}">
	<!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/db71cea23f.js"></script>
</head>
<body>
	<div class="wrapp" id="app">
		<nav class="navbar navbar-expand-lg navbar-light wrapp_nav">
			<div class="logo-space ">
				<img src="/img/logoPrincipal.png">
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="{{url('/')}}"><span>INICIO</span></a></li>
				<li class="nav-item"><a class="nav-link" href="{{url('/productos')}}"><span>PRODUCTOS</span></a></li>
				<li class="nav-item"><a class="nav-link" href="{{url('/articulos')}}"><span>ARTÍCULOS</span></a></li>
				<li class="nav-item"><a class="nav-link" href="{{url('/contacto')}}"><span>CONTACTO</span></a></li>
				<li class="nav-item"><a class="nav-link" href="{{url('/nosotros')}}"><span>NOSOTROS</span></a></li>
				<li class="nav-item"><a class="nav-link toBuy"  href="{{route('Carrito')}}"><i class="far fa-clipboard"></i>&nbsp;</a></li>
			
				<!-- Authentication Links -->
				@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
					@endif
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->nombre }}<span class="caret"></span>
						</a>

						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="{{ route('profile') }}">{{ __('Perfil') }}</a>
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
			</div>
		</nav>
		{{-- SLIDER BOOTSTRAP --}}
		@section('slider-carousel')
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		  	@isset($sli)
		  	@foreach($sli as $key => $s)
		    <div class="carousel-item @if($key == 0) active @endif">
		      <img src="{{ url('/img/slider/'.$s->nombre)}}" class="d-block w-100" alt="">
		    </div>
		    @endforeach
		    @endisset
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon arrow" aria-hidden="true "></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon arrow" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		@show
		{{-- CONTENIDO DE LAYOUT --}}
		<div class="wrapp-content" >
			@if (session('success'))
                <div class="alert alert-success ">{{session('success')}}</div>
            @endif
			<div class="container mt-3">
			@section('content')
				@show
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{url('/js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{url('/js/customs/helper.js')}}"></script>
	
	<script src="{{ asset('js/app.js') }}" defer></script>
	<br><br>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<img src="/img/logo.png">
				</div>
				<div class="col-sm-4">
					<ul class="list-group">
						<li class="list-group-item style-1"><a href="{{url('/')}}">Inicio</a></li>
						<li class="list-group-item style-1"><a href="{{url('/productos')}}">Productos</a></li>
						<li class="list-group-item style-1"><a href="{{url('/articulos')}}">Artículos</a></li>
						<li class="list-group-item style-1"><a href="{{url('/contacto')}}">Contacto</a></li>
						<li class="list-group-item style-1"><a href="{{url('/nosotros')}}">Nosotros</a></li>
					</ul>
				</div>
				<div class="col-sm-4">
					<ul class="list-group">
						<li class="list-group-item style-1 list-group-label"><h3>SÍGUENOS EN :</h3></li>
						<li class="list-group-item style-1"><a href="#">Facebook <i class="fab fa-facebook-f"></i></a></li>
						<li class="list-group-item style-1"><a href="#">Twitter <i class="fab fa-twitter"></i></a></li>
						<li class="list-group-item style-1"><a href="#">Instagram <i class="fab fa-instagram"></i></a></li>
						<li class="list-group-item style-1"><a href="#">Youtube <i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>