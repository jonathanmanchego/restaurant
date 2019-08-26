@extends('layout.public-noslider')

@section('content')
<div class="page-header" style="background-color: rgba(0, 0, 0, 0.6); background-image: url(/img/bannertest.jpg); text-shadow: black 1px 1px 5px; background-position: 50% -7.4px;" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Perfil</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
<<<<<<< Updated upstream
    <div class="row justify-content-center">
     <i class="far fa-user fa-5x"></i>
        <div class="col-md-8">
           
            @if (session('fail'))
                <div class="alert alert-danger ">{{session('fail')}}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Perfil') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sis-login-post') }}">
                        @csrf

                        <div class="form-group row">
                            {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                             {{ Auth::user()->password }}
                        </div>

                        <div class="form-group row">
                            
                        </div>

                        <div class="form-group row">
                            
                        </div>

                        <div class="form-group row mb-0">
                            
                        </div>
                    </form>
=======
<br><br>
    <div class="row">   
    @if (session('fail'))
    <div class="alert alert-danger ">{{session('fail')}}</div>
    @endif
    </div>
    <div class="row">
        <div class="col-sm-2">
            <i class="fa fa-fw fa-user fa-5x"></i>
        </div>
        <div class="col-sm-10">
        
            <form method="POST" action="">
                @csrf
                <div class="form-group row">
                    <div class="row col-md-6">
                        <label for="nombre" class="col-md-3 col-form-label">{{ __('Nombres') }}</label>
                        <div class="col-md-9">
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ Auth::user()->nombre }}" autofocus>
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <label for="apellido" class="col-md-3 col-form-label">{{ __('Apellidos') }}</label>
                        <div class="col-md-9">
                            <input id="apellido" type="text" class="form-control" name="apellido" value="{{ Auth::user()->apellido }}" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-md-12">
                        <label for="nombre" class="col-md-1 col-form-label">{{ __('E-mail') }}</label>
                        <div class="col-md-10">
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ Auth::user()->nombre }}@gmail.com" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-md-6">
                        <label for="telefono" class="col-md-3 col-form-label">{{ __('Telefono') }}</label>
                        <div class="col-md-9">
                            <input id="telefono" type="text" class="form-control" name="telefono" value="{{ Auth::user()->telefono }}" autofocus>
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <label for="celular" class="col-md-3 col-form-label">{{ __('Celular') }}</label>
                        <div class="col-md-9">
                            <input id="celular" type="text" class="form-control" name="celular" value="{{ Auth::user()->celular}}" autofocus>
                    </div>
                </div>
                </div>
                
                <div class="form-group row">
                    <div class="row col-md-6">
                        <label for="zona" class="col-md-3 col-form-label">{{ __('Zona') }}</label>
                        <div class="col-md-9">
                            <select name="zona" id="zona" class="form-control">
                                @foreach ($zonas as $zona)
                                    @if($zona['id'] == Auth::user()->zonas_id )
                                        <option selected value="{{$zona['id']}}">{{$zona['nombre']}}</option>
                                    @endif
                                    @if($zona['id'] != Auth::user()->zonas_id)
                                        <option value="{{$zona['id']}}">{{$zona['nombre']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <label for="direccion" class="col-md-3 col-form-label">{{ __('Dirección') }}</label>
                        <div class="col-md-9">
                            <input id="direccion" type="text" class="form-control" name="direccion" value="{{ Auth::user()->direccion }}" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="row col-md-6">
                        <label for="tipo_documento" class="col-md-3 col-form-label">{{ __('Tipo Documento') }}</label>

                        <div class="col-md-9">
                            <select name="tipo_documento" id="tipo_documento" class="form-control @error('tipo_documento') is-invalid @enderror">
                                @foreach ($tipo_docs as $tipo_doc)
                                    <option value="{{$tipo_doc['id']}}">{{$tipo_doc['nombre']}}</option>
                                        @if($zona['id'] == Auth::user()->zonas_id )
                                        <option selected value="{{$tipo_doc['id']}}">{{$tipo_doc['nombre']}}</option>
                                    @endif
                                    @if($zona['id'] != Auth::user()->zonas_id)
                                        <option value="{{$tipo_doc['id']}}">{{$tipo_doc['nombre']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row col-md-6">
                        <label for="nrodocumento" class="col-md-3 col-form-label">{{ __('N° Doc.') }}</label>
                        <div class="col-md-9">
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
                        {{ __('Cambiar Contraseña') }} 
                    </button>
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< Updated upstream
=======

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
</div><br><br>
<!-- end modal-->
>>>>>>> Stashed changes
@endsection
