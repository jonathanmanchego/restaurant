@extends('layout.public')

@section('content')
<div class="container">
    <div class="row mr-md-2 justify-content-center">
        @if ($dato)
            <div class="card mr-3 w-100 border-dark">
                {{-- <div class="card-header"></div> --}}
                <div class="row no-gutters">
                	<div class="col-md-4">
                    	<img src="{{url('/uploads/'.$dato->imagen)}}" alt="" class="card-img">
                	</div>
                	<div class="col">
	                    <div class="card-body text-center">
	                        <h4 class="card-title mr-auto">{{$dato->nombre}}</h4>
                            <p class="card-text">
                                {{$dato->descripcion}}
                            </p>
	                        <ul class="list-group list-group-flush">
							    <li class="list-group-item">S/.{{number_format($dato->precio,2,".",",")}}</li>
							    {{-- <li class="list-group-item">S/.{{number_format($dato->precio2,2,".",",")}} <span class="badge badge-dark">Tarjeta Oh!</span></li>
								<li class="list-group-item">S/.{{number_format($dato->precio3,2,".",",")}} <span class="badge badge-dark">Exclusivo!</span></li> --}}
						  	</ul>
	                        {{-- <a href="{{route('productoMostrar',['id' => $dato->id])}}" class="btn btn-primary">
	                            {{__('Ver Mas')}}
	                        </a> --}}
	                    </div>
                	</div>
                    <div class="card-footer text-center col-md-12 text-muted">
                    	<a href="{{route('addToCar',['producto' => $dato->id,'cantidadAdd' => 1])}}" class=" w-75 btn btn-primary">
                            {{__('Añadir Compra')}}
                        </a>
                    </div>
                </div>
			</div>
			@if($dato->video)
				<div class="row">
						<video src="{{url('/uploads/'.$dato->video)}}" preload controls></video>
				</div>
			@endif
        @endif
    </div>
</div>
@endsection
