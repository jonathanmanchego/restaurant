@extends('layout.sistema')


@section('content')
<div class="row">
    @if(!empty($mesaGlobal))
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-body">
                <div class="form-group row">
                                         
                    <div class="col-md-3">
                       {{-- <label for="mesas">Mesa ID {{$mesaGlobal}} :</label>
                        <select name="mesa" id="mesas" class="form-control" required>
                            <option value="">Seleccione la Mesa</option>
                            @foreach ($mesas as $key => $mesa)
                                @if($mesa->estado->nombre == 'LIBRE')
                                    <option value="{{$mesa->id}}">Mesa #{{$mesa->numero}}</option>
                                @endif
                            @endforeach
                        </select>--}}
                        @foreach ($mesas as $key => $mesa)
                            @if($mesa->id == $mesaGlobal)
                                <input name="mesa" id="mesas" class="form-control" type="hidden" value="{{$mesa->id}}" readonly="readonly"></option>
                                <br><h3>&nbsp;<b>Mesa Nro : {{$mesa->numero}}</b> <a class="btn btn-primary"  href="{{ url('/sistema/mesas-show') }}"><i class="fa fa-search-plus"></i></a></h3>
                            @endif
                        @endforeach
                    </div>   
                    <div class="col-md-3">
                        <label for="">Fecha:</label>
                        <span class="form-control" id="fecha" ></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-3 col-md-2">
                        <label for="">Producto:</label>
                        <button id="" type="button" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#modal-default1" ><span class="fa fa-list"></span> Lista</button>
                    </div>
                </div>
                <table id="tbventas" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="listaOrden">
                        {{-- <tr v-for="item in listado">
                            <td>{{item.codigo}}</td>
                            <td>{{item.nombre}}</td>
                            <td>{{item.precio}}</td>
                            <td>{{item.stock}}</td>
                            <td><input type="number" min="1" max="{{item.stock}}" v-model="item.cantidad"></td>
                            <td>{{item.subtotal}}</td>
                            <td><button class="btn btn-danger" onclick="eliminarProd({{item.id}})"><span class="fa fa-close"></span></button></td>
                        </tr> --}}
                    </tbody>
                </table>
                <br>
                <div class="form-group row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Subtotal:</span>
                            <input type="text" class="form-control" placeholder="" name="subtotal" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">IGV:</span>
                            <input type="text" class="form-control" placeholder="" name="igv" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Descuento:</span>
                            <input type="text" class="form-control" placeholder="" name="descuento" value="0.00" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Total:</span>
                            <input type="text" class="form-control" placeholder="" name="total" readonly="readonly">
                        </div>
                    </div>
                </div>   
            </div>
            <div class="box-footer">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success btn-flat" onclick="send()">Enviar</button>
                            </div>     
                        </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="col-lg-12">
        <a class="btn btn-primary" href="{{ url('/sistema/mesas-show') }}">Seleccionar Mesa</a>
    </div>
    @endif
</div> 
@endsection
@include('sistema.orden.modal-producto')
@section('scripts')

<script type="text/javascript" src="{{url('/js/customs/orden/script.js')}}"></script>
@endsection