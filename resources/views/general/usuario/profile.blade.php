@extends('layout.public-noslider')

@section('content')
<div class="container">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
