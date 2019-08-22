<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<link rel="stylesheet" type="text/css" href="{{url('/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/css_boot/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/app.css')}}">
</head>
<body>
	<div class="wrapp">
		<nav class="wrapp_nav">
			<div class="logo-space">
				<img src="/img/logoPrincipal.png">
			</div>
			<ul>
				<li><a href="{{url('/')}}"><span>INICIO</span></a></li>
				<li><a href="{{url('/productos')}}"><span>PRODUCTOS</span></a></li>
<<<<<<< Updated upstream
				<li><a href="{{url('/articulos')}}"><span>ARTICULOS</span></a></li>
				<li><a class="toBuy" href="{{url('/pedido')}}"><i class="far fa-clipboard"></i></a></li>
=======
				<li><a href="{{url('/articulos')}}"><span>ARTÍCULOS</span></a></li>
				<li><a href="{{url('/contacto')}}"><span>CONTACTO</span></a></li>
				<li><a href="{{url('/articulos')}}"><span>NOSOTROS</span></a></li>
				<li><a class="toBuy" href="{{route('Carrito')}}"><i class="far fa-clipboard"></i></a></li>
>>>>>>> Stashed changes
			
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
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
		</nav>
		{{-- SLIDER BOOTSTRAP --}}
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="{{ url('img/slider/slider1.jpg')}}" class="d-block w-100" alt="">
		    </div>
		    <div class="carousel-item">
		      <img src="{{ url('img/slider/slider2.jpg')}}" class="d-block w-100" alt="">
		    </div>
		    {{-- <div class="carousel-item">
		      <img src="..." class="d-block w-100" alt="...">
		    </div> --}}
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
		{{-- CONTENIDO DE LAYOUT --}}
		<div class="wrapp-content">
<<<<<<< Updated upstream
=======
			@if (session('success'))
                <div class="alert alert-success ">{{session('success')}}</div>
            @endif
>>>>>>> Stashed changes
			<div class="container mt-3">
			@section('content')
				@show
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="/js/js_boot/bootstrap.min.js"></script>
</body>
</html>