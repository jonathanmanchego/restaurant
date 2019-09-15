@extends('layout.sistema')


@section('content')
@if(!empty($mesaGlobal))
<tabla-orden></tabla-orden>
@else
    <div class="col-lg-12">
        <a class="btn btn-primary" href="{{ url('/sistema/mesas-show') }}">Seleccionar Mesa</a>
    </div>
@endif
@endsection
{{-- @include('sistema.orden.modal-producto') --}}

@include('partials.scripts.index')
@section('scripts')
<script src="{{ url('/js/app.js') }}"></script>
{{-- <script type="text/javascript" src="{{url('/js/customs/orden/script.js')}}"></script> --}}
@endsection