@extends('layout.public')

@section('content')
<div class="container"> 
    <center><h3>{{$title}}</h3></center><br><br>   

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3 text-center">
        <label for="sel1">Seleccionar lista:</label>
        <select class="form-control" id="sel1">
            <option value="">TODO</option>
            <option value="">ENTRADAS</option>
            <option value="">POSTRES</option>
            <option value="">PLATOS</option>
            <option value="">BEBIDAS</option>
        </select>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6 text-center"> 
        <label for="in-buscar">Buscar en Carta:</label>
        <input type="text" class="form-control" id="in-buscar">
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 text-center"> 
        <label for="btn-buscar"></label>
        <button type="button" class="btn btn-warning form-control" id="btn-buscar">Buscar</button>
    </div>
</div><br><br>
    @if (!empty($data[0]))
    <div class="container">
       @foreach ($data as $key => $item)
        @if ($key%2==0)
          <div class="row">
        @endif    
        @if ($key%2!=0)
          <div class="col-sm-2 col-md-2 col-lg-2 text-center">
                <--| |-->
            </div>
        @endif 
            <div class="col-sm-5 col-md-5 col-lg-5 text-center">
                <table border="0">
                    <tr>
                        <td colspan="2"> <b>{{$item["nombre"]}}</b> </td> 
                    </tr>
                    <tr>
                        <td width="200" height="200"><img class="img-responsive" src="img/{{$item["foto"]}}" title="{{$item["nombre"]}}"></td>
                        <td>{{$item["descripcion"]}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><button type="button" id="{{$item["id"]}}" class="btn btn-warning">Ordenar {{$item["id"]}}</button></td>
                    </tr>
                </table> 
            </div>
         @if ($key%2!=0)
          </div><br>
        @endif 
            
       @endforeach
    </div>
    @endif
    
@endsection
