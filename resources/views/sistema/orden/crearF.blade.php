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
                {{ csrf_field() }}
                <div class="box-body">
                        <div class="form-group">
                                <div class="col-xs-4 col-md-3">
                                    <label for="">Comprobante:</label>
                                    <select name="comprobantes" id="comprobantes" class="form-control" required>
                                        <option value="">Seleccione...</option>
                                        <option value="">BOLETA</option>
                                        <option value="">FACTURA</option>
                                    </select>
                                    <input type="hidden" id="idcomprobante" name="idcomprobante">
                                    <input type="hidden" id="igv" value="18">
                                </div>
                                <div class="col-xs-4  col-md-3">
                                    <label for="">Serie:</label>
                                    <input type="text" onkeypress="" class="form-control" id="serie" name="serie" readonly>
                                </div>
                                <div class="col-xs-4  col-md-3">
                                    <label for="">Numero:</label>
                                    <input type="text"  onkeypress="" class="form-control" id="numero" name="numero" readonly>
                                </div>
                                 <div class="col-xs-4  col-md-3">
                                    <label for="">Mesas :</label>
                                    <select name="mesas" id="mesas" class="form-control" required>
                                        <option value="">Seleccione la Mesa</option>
                                        <option value="0">Mesa #01</option>
                                        <option value="0">Mesa #02</option>
                                        <option value="">Mesa #03</option>
                                        <option value="">Mesa #04</option>
                                        <option value="">Mesa #05</option>
                                        <option value="">Mesa #06</option>
                                        <option value="">Mesa #07</option>
                                        <option value="">Mesa #08</option>
                                        <option value="">Mesa #09</option>
                                    </select>
                                    <input type="hidden" id="idmesa" name="idmesa">
                                    <input type="hidden" id="capacidad" name="capacidad">
                                    <input type="hidden" id="estado_mesa_id" name="estado_mesa_id">
                                    <input type="hidden" id="estado" name="estado">
                                </div>   
                                <div class="col-xs-4 col-md-6">
                                    <label for="">Cliente:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idcliente" id="idcliente">
                                        <input type="text" class="form-control"   id="cliente" onkeypress="" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
                                <div class="col-xs-4 col-md-3">
                                    <label for="">Fecha:</label>
                                    <input type="date" class="form-control" name="fecha" value="2019-07-04"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6 col-md-4">
                                    <label for="">Producto:</label>
                                    <input type="text" style="text-transform:uppercase;" class="form-control" id="producto">
                                </div>
                                <div class="col-xs-3 col-md-2">
                                    <label for="">&nbsp;</label>
                                    <button id="btn-agregar" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                </div>
                                <div class="col-xs-3 col-md-2">
                                    <label for="">&nbsp;</label>
                                    <button id="" type="button" class="btn btn-primary btn-flat btn-block" data-toggle="modal" data-target="#modal-default1" ><span class="fa fa-list"></span> Lista</button>
                                </div>
                            </div>
                            <table id="tbventas" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock Max.</th>
                                        <th>Cantidad</th>
                                        <th>Importe</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

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
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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