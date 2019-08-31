@extends('layout.public')

@section('content')
<div class="page-header" style="background-color: rgba(0, 0, 0, 0.6); background-image: url(/img/bannertest.jpg); text-shadow: black 1px 1px 5px; background-position: 50% -7.4px;" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1></h1>
            </div>
        </div>
    </div>
</div><br><br>
<div class="container">
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3 text-center">
        
        <select class="form-control" id="sel1">
            <option value="">TODO</option>
            <option value="">ENTRADAS</option>
            <option value="">POSTRES</option>
            <option value="">PLATOS</option>
            <option value="">BEBIDAS</option>
        </select>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 text-center"> 
        <input type="text" class="form-control" id="in-buscar" placeholder="Buscar en Carta">
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2 text-center"> 
        <button  class="btn btn-warning form-control" id="btn-buscar"><i class="fa fa-search" aria-hidden="true"></i>
</button>
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1 text-center"> 
        <a class="btn btn-danger" href="{{ route('Carrito') }}"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
    </div>
</div>
    <div class="row mr-md-2 justify-content-justify">
        @if ($data)
            @foreach ($data as $key => $item)
                <div class="col-md-3 ">
                    <div class="card mr-1 my-2 border-dark">
                        {{-- <div class="card-header"></div> --}}
                            <img src="{{url('/uploads/'.$item->imagen)}}" alt="" class="img-card-top">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->nombre}}</h5>
                            <p class="card-text">
                                {{$item->descripcion}}
                            </p>
                            <p>
                                <span>Precio</span>
                                <span>S/.{{number_format($item->precio,2,".",",")}}</span>
                            </p>
                            <a href="{{route('productoMostrar',['id' => $item->id])}}" class="btn btn-default">
                                {{__('Detalles')}}
                            </a>
                            <a href="{{route('addToCar',['producto' => $item->id,'cantidadAdd' => 1])}}" class="btn btn-warning">
                            {{__('Comprar')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cold-md-1"></div>
            @endforeach
        @endif
    </div>
</div>
@endsection
