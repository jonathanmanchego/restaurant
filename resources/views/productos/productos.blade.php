@extends('layout.public')

@section('content')
<div class="container">
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
                            <a href="{{route('productoMostrar',['id' => $item->id])}}" class="btn btn-primary">
                                S/.{{number_format($item->precio,2,".",",")}}
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
