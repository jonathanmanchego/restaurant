@extends('layout.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card bg-secondary text-white">
                <div class="card-header">{{ __('Registro') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="row col-md-6">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-8">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}"  autocomplete="nombre" autofocus>

                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                <div class="col-md-8">
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}"  autocomplete="apellido" autofocus>

                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-md-6">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                                <div class="col-md-8">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  autocomplete="password" autofocus>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-md-6">
                                <label for="tipo_documento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Documento') }}</label>

                                <div class="col-md-8">
                                    <select name="tipo_documento" id="tipo_documento" class="form-control @error('tipo_documento') is-invalid @enderror">
                                        @foreach ($tipo_docs as $tipo_doc)
                                            <option value="{{$tipo_doc['id']}}">{{$tipo_doc['nombre']}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input id="tipo_documento" type="text" class="form-control @error('tipo_documento') is-invalid @enderror" name="tipo_documento" value="{{ old('tipo_documento') }}"  autocomplete="tipo_documento" autofocus> --}}

                                    @error('tipo_documento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <label for="nrodocumento" class="col-md-4 col-form-label text-md-right">{{ __('N° Documento') }}</label>

                                <div class="col-md-8">
                                    <input id="nrodocumento" type="text" class="form-control @error('nrodocumento') is-invalid @enderror" name="nrodocumento" value="{{ old('nrodocumento') }}"  autocomplete="nrodocumento" autofocus>

                                    @error('nrodocumento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-md-6">
                                <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col-md-8">
                                    <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}"  autocomplete="correo" autofocus>

                                    @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="row col-md-6">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                                <div class="col-md-8">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}"  autocomplete="telefono" autofocus>

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                                <div class="col-md-8">
                                    <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}"  autocomplete="celular" autofocus>

                                    @error('celular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="row col-md-6">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                                <div class="col-md-8">
                                    <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}"  autocomplete="direccion" autofocus>

                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row col-md-6">
                                <label for="zona" class="col-md-4 col-form-label text-md-right">{{ __('Zonas') }}</label>

                                <div class="col-md-8">
                                    <select name="zona" id="zona" class="form-control @error('zona') is-invalid @enderror">
                                        @foreach ($zonas as $zona)
                                            <option value="{{$zona['id']}}">{{$zona['nombre']}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input id="zona" type="text" class="form-control @error('zona') is-invalid @enderror" name="zona" value="{{ old('zona') }}"  autocomplete="zona" autofocus> --}}

                                    @error('zona')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8 mx-auto">
                                <button type="submit" class=" w-100 btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
