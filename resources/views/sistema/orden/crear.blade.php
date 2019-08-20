@extends('layout.sistema')


@section('content')
<div class="row">
    <div class="col-lg-12">
        
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">
                    <a href="" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i> Volver al listado
                    </a>
                </div>
            </div>
            <form action="" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                <div class="box-body">
                    <div class="form-group">                     
                        <div class="col-xs-4  col-md-3">
                            <label for="">Mesa :</label>
                            <select name="mesas" id="mesas" class="form-control" required>
                                <option value="">Seleccione la Mesa</option>
                                @foreach ($mesas as $key => $mesa)
                                    @if($mesa->estado->nombre == 'LIBRE')
                                        <option value="{{$mesa->id}}">Mesa #{{$mesa->numero}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>   
                        <div class="col-xs-4 col-md-6">
                            <label for="">Cliente:</label>
                            <div class="input-group">
                                <input type="hidden" name="idcliente" id="">
                                <input type="text" class="form-control"   id="cliente" onkeypress="" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                </span>
                            </div>
                        </div> 
                        <div class="col-xs-4 col-md-3">
                            <label for="">Fecha:</label>
                            <input type="date" class="form-control" name="fecha" id="fecha"  required>
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

                    <div class="form-group">
                        <div class="col-xs-6 col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">Subtotal:</span>
                                <input type="text" class="form-control" placeholder="" name="subtotal" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">IGV:</span>
                                <input type="text" class="form-control" placeholder="" name="igv" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon">Descuento:</span>
                                <input type="text" class="form-control" placeholder="" name="descuento" value="0.00" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
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
                                    <button type="submit" class="btn btn-success btn-flat">Enviar</button>
                                </div>     
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 
@endsection
@include('sistema.orden.modal-producto')

@section("scripts")
<script>
    $(function() {
        var hoy = new Date();
        //Año
        y = hoy.getFullYear();
        //Mes
        m = hoy.getMonth() + 1;
        //Día
        d = hoy.getDate();
            if(d<10)
                d='0'+d; //agrega cero si el menor de 10
            if(m<10)
                m='0'+m //agrega cero si el menor de 10
        //document.getElementById('fecha').value=y+"-"+m+"-"+d;
         $("#fecha").val(y+"-"+m+"-"+d);
         console.log("fecha"+d+"/"+m+"/"+y);

    });
    let orden_actual = {
        mesa : 0,
        total: 0,
        total_redondeado : 0,
        tiempo_espera_total : 0,
        detalle : []
        };
    function insertarItem(data){
        orden_actual.detalle.push({
            producto_id : data.id,
            cantidad : 1,
            subtotal : parseFloat(data.precio),
            promociones_id : null,
            comentario: data.comentario
        });
        // app.data.listado.push({
        //     data.id,
        //     data.nombre,
        //     data.precio,
        //     data.stock,
        //     cantidad : 1,
        //     subtotal : data.precio
        // });
    }
    $(".btn-agregar2").on("click",function(){
        let id_item = $(this).data('id'),nombre_item = $(this).data('nombre'),codigo_item = $(this).data('codigo'),categoria_item = $(this).data('categoria'),precio_item = $(this).data('precio'),stock = $(this).data('stock');
            if(stock>0){
                insertarItem(this.dataset);
                html = `<tr>
                <td>${codigo_item}</td>
                <td>${nombre_item}</td>
                <td>${precio_item}</td>
                <td>${stock}</td>
                <td><input type="number" min="1" max="${stock}" value="1"></td>
                <td>${precio_item}</td>
                <td><button class="btn btn-danger" onclick="eliminarProd(${id_item})"><span class="fa fa-close"></span></button></td>
                </tr>`;
            }
            $("#tbventas tbody").append(html);
            // // sumar();
            // $("#btn-agregar").val(null);
            // $("#producto").val(null);
     
    });
    $(document).on("click",".btn-remove-producto", function(){
        $(this).closest("tr").remove();
        sumar();
    });
    $(document).on("keyup","#tbventas input.cantidades", function(){
        cantidad = $(this).val();
        precio = $(this).closest("tr").find("td:eq(2)").text();
        importe = cantidad * precio;
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe.toFixed(2));
        sumar();
    });
    // function sumar()
    // {
    //     subtotal = 0;
    //     $("#tbventas tbody tr").each(function(){
    //         subtotal = subtotal + Number($(this).find("td:eq(5)").text());
    //     });
    //     $("input[name=subtotal]").val(subtotal.toFixed(2));
    //     porcentaje = $("#igv").val();18;
    //     igv = subtotal * (porcentaje/100);
    //     $("input[name=igv]").val(igv.toFixed(2));
    //     descuento = /*$("input[name=descuento]").val();*/0;
    //     total = subtotal + igv - descuento;
    //     $("input[name=total]").val(total.toFixed(2));

    // }

</script>
@endsection
