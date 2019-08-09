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
    <div class="col-sm-5 col-md-5 col-lg-5 text-center"> 
        <label for="in-buscar"></label>
        <input type="text" class="form-control" id="in-buscar" placeholder="Buscar en Carta">
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 text-center"> 
        <label for="btn-buscar"></label>
        <button type="button" class="btn btn-warning form-control" id="btn-buscar">Buscar <i class="fa fa-search" aria-hidden="true"></i>
</button>
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1 text-center"> 
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-modal-pedido"> <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i></button>
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
<!-- Large modal -->
<div class="modal fade bd-modal-pedido" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="container"> 
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <b>Pedido</b>
                    <br><br>
                </div>
                
            </div>
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>CHICHARRON DE CHANCHO</td>
                        <td>40.00</td>
                        <td>2</td>
                        <td>80.00</td>
                    </tr>
                     <tr>
                        <td>2</td>
                        <td>CHICHARRON DE CUY</td>
                        <td>45.00</td>
                        <td>1</td>
                        <td>45.00</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right"><b>Total</b></td>
                        <td>125.00</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
  </div>
</div>  

@endsection
