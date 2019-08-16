@extends('layout.public')

@section('content')
<div class="container">
    <div class="row mr-md-2 justify-content-center">
        @if ($carrito)
            <div class="col-md-8 px-2">
                <div class="card mx-auto">
                    <div class="card-header">
                        {{__('Carrito Compras')}}
                        <a class="ml-auto" href="{{route('reset')}}">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        @foreach ($carrito as $item)
                            <div class="row justify-content-center">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="{{url('/uploads/'.$item->imagen)}}" class="card-img" alt="{{$item->nombre}}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$item->nombre}}</h5>
                                                <div class="container">
                                                    <div class="row mb-3">
                                                        <div class="col-md-2">
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <button onclick="javascript:remove({{$item->id}})" type="button" class="btn btn-primary"> - </button>
                                                                <input type="text" class="borde border-secondary text-center form-control-plaintext" name="cantidad_{{$item->id}}" id="total_{{$item->id}}" value="{{$item->total}}">
                                                                <button onclick="javascript:add({{$item->id}})" type="button" class="btn btn-danger"> + </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="PrecioIndi">{{__('Unidad')}}</label>
                                                        </div>
                                                        <div class="col-md-6 d-md-flex align-items-center">
                                                            <span>S/.</span>
                                                            <input type="text" readonly class="border-0" id="PrecioIndi_{{$item->id}}" value="{{number_format($item->precio,2)}}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="SubTotal">{{__('SubTotal')}}</label>
                                                        </div>
                                                        <div class="col-md-6 d-md-flex align-items-center">
                                                            <span>S/.</span>
                                                            <input readonly class="border-0" id="subTotal_{{$item->id}}" type="text" name="precio_{{$item->id}}" value="{{number_format($item->subTotal,2)}}">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-3"><strong>{{__('Total Pedido')}}</strong> S/.<span id="totalCarrito">{{$total}}</span></div>
                            <div class="col-md-6">
                                <div class="btn btn-primary btn-block">{{__('Realizar Pedido')}}</div>
                            </div>
                            <div class="col-md-3 ml-auto"><strong>{{__('Cantidad Productos')}}</strong><span id="total_items">{{$items}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
{{-- <script type="text/javascript" src="{{url('/js/customs/public/script.js')}}"></script> --}}
<script type="text/javascript">
 function add(x){
    $.ajax({
        url: `/carrito/update/${x}/1`,
        success(res){
        console.log(res);
            if(res.out == 'success'){
                // console.log("jaja");
                let total = $(`#total_${x}`).val();
                total = parseInt(total)+1;
                $(`#total_${x}`).val(total);
                console.log("add");
                let pU = parseFloat($(`#PrecioIndi_${x}`).val());
                let sT = parseFloat($(`#subTotal_${x}`).val());
                $(`#subTotal_${x}`).val((sT + pU).toFixed(2));
                let totalCarrito = parseFloat($('#totalCarrito').text());
                totalCarrito += pU;
                $('#totalCarrito').text(totalCarrito);
                let total_items = $('#total_items').text();
                total_items++;
                $('#total_items').text(total_items);
            }
            
        },
        error(e){
            console.log(e);
        }
    });
 }
 function remove(x){
    $.ajax({
        url: `/carrito/remove/${x}/1`,
        success(data){
            if(data.out == 'success'){
                let total = $(`#total_${x}`).val();
                total = parseInt(total)-1;
                $(`#total_${x}`).val(total);

                let pU = parseFloat($(`#PrecioIndi_${x}`).val());
                let sT = parseFloat($(`#subTotal_${x}`).val());
                console.log(pU);
                $(`#subTotal_${x}`).val((sT - pU).toFixed(2));
                let totalCarrito = parseFloat($('#totalCarrito').text());
                totalCarrito -= pU;
                $('#totalCarrito').text(totalCarrito);
                let total_items = $('#total_items').text();
                total_items--;
                $('#total_items').text(total_items);
            }else if(data.out == 'redirect'){
                location.reload();
            }
            
        },
        error(e){
            console.log(e);
        }
    });
 }
 function hacerPedido(){
    $.ajax({
        url: `/carrito/completo`,
        success(data){
            
            
        },
        error(e){
            console.log(e);
        }
    });
 }
</script>

@endsection


