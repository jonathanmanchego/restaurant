<div class="modal fade" id="modal-default1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lita de Productos</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" style="text-transform:uppercase;" class="form-control" id="buscarprod">
                    </div>
                    <div class="col-md-3">
                        
                                    <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                    </div>                                           
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    
                                    <th>Categoria</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                            <tbody id="busqueda_producto">
                                @foreach ($productos as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>
                                    <td>{{$producto->codigo}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{number_format($producto->precio, 2)}} </td>
                                    
                                    <td>{{$producto->categoria->nombre}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-success" id="btn-agregarprod" onclick="agregarProd(this)" data-id="{{$producto->id}}"data-codigo="{{$producto->codigo}}" data-nombre="{{$producto->nombre}}" data-categoria="{{$producto->categoria->nombre}}" data-precio="{{number_format($producto->precio, 2)}}">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    