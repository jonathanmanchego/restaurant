@extends('layout.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     
        <div class="col-md-8">
           
            @if (session('fail'))
                <div class="alert alert-danger ">{{session('fail')}}</div>
            @endif
            <div class="card bg-secondary text-white">
                <div class="card-header"><i class="far fa-user fa-1x"></i> {{ __('Perfil') }} </div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <div class="row col-md-11">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <div class="col-md-8">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ Auth::user()->nombre }}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-md-11">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                                <div class="col-md-8">
                                    <input id="apellido" type="text" class="form-control" name="apellido" value="{{ Auth::user()->apellido }}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-md-11">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                                <div class="col-md-8">
                                    <input id="telefono" type="text" class="form-control" name="telefono" value="{{ Auth::user()->telefono }}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                             <div class="row col-md-11">
                                <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                                <div class="col-md-8">
                                    <input id="celular" type="text" class="form-control" name="celular" value="{{ Auth::user()->celular }}" autofocus>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="row col-md-11">
                                <label for="zona" class="col-md-4 col-form-label text-md-right">{{ __('Zonas') }}</label>
                                <div class="col-md-8">
                                    <select name="zona" id="zona" class="form-control">
                                        <option selected value="{{Auth::user()->zona->id}}">{{Auth::user()->zona->nombre}}</option>
                                        @foreach ($zonas as $zona)
                                            <option value="{{$zona->id}}">{{$zona->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-md-11">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>
                                <div class="col-md-8">
                                    <input id="direccion" type="text" class="form-control" name="direccion" value="{{ Auth::user()->direccion }}" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-md-11">
                                <label for="tipo_documento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Documento') }}</label>

                                <div class="col-md-8">
                                    <select name="tipo_documento" id="tipo_documento" class="form-control @error('tipo_documento') is-invalid @enderror">
                                        <option value="{{Auth::user()->doc->id}}">{{Auth::user()->doc->nombre}}</option>
                                        @foreach ($tipo_docs as $tipo_doc)
                                            <option value="{{$tipo_doc->id}}">{{$tipo_doc->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-11">
                                <label for="nrodocumento" class="col-md-4 col-form-label text-md-right">{{ __('N° Documento') }}</label>
                                <div class="col-md-8">
                                    <input id="nrodocumento" type="text" class="form-control" name="nrodocumento" value="{{ Auth::user()->nrodocumento }}"  autocomplete="nrodocumento" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-lg-8 mx-auto">
                                <button type="submit" class=" w-100 btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="form-group row ">
                    <div class="col-lg-8 mx-auto">
                        <button type="submit" type="button" class="w-100 btn btn-link" data-toggle="modal" data-target="#myModal">
                           <font color="white"> {{ __('Cambiar Contraseña') }}</font>
                        </button>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Cambiar Contraseña</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                
        </div>
        <form method="POST" action="">
            <div class="modal-body">
                <label for="password">{{ __('Contraseña Actual') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value=""  autocomplete="password" autofocus>
                
                <label for="newpassword">{{ __('Nueva Contraseña') }}</label>
                <input id="newpassword" type="password" class="form-control " name="password" value="" >

                <label for="repassword">{{ __('Repetir Nueva Contraseña') }}</label>
                <input id="repassword" type="password" class="form-control " name="password" value="" >
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >{{ __('Guardar') }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
        </div>

    </div>
</div>
<!-- end modal-->
@endsection
