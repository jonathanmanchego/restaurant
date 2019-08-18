@extends('layout.sistema')


@section('content')
    <div style="display: none;" >
        vacio
        <div id="formato"></div>
    </div>
     @if (!empty($data[0]))
        <div class="container">
            <table  class="table">
                <tr>
                    <th>#</th>
                    <th>MESA</th>
                    <th>ESTADO</th>
                    <th>HORA</th>
                    <th>Imprimir</th>
                </tr>
                @foreach ($data as $key => $item)
                    <tr>
                    <td > <b>{{$key+1}}</b> </td>
                    <td > <b>{{$item["mesa"]}}</b> </td>
                    <td > <b>{{$item["estado"]}}</b> </td> 
                    <td > <b>{{$item["hora"]}}</b> </td> 
                    <td ><button id="btn-{{$item["id"]}}" onclick='imprimir({{$item["id"]}})' class="btn btn-warning">Imprimir orden ID {{$item["id"]}}</button></td>
                    </tr>
                @endforeach
            </table> 
        </div>
    @endif
           

    @include('sistema.chef.modal-descripcion')
@endsection
@section('scripts')
  <script src="{{url('/js/jQuery.print.js')}}"></script><!-- tiene que cargar despues del jquery-->
  <script src="{{url('/js/customs/chef/script.js')}}"></script>
@endsection