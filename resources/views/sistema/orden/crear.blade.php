@extends('layout.sistema')


@section('content')
<tabla-orden></tabla-orden>
@endsection
{{-- @include('sistema.orden.modal-producto') --}}

@include('partials.scripts.index')
@section('scripts')
{{-- <script type="text/javascript" src="{{url('/js/customs/orden/script.js')}}"></script> --}}
@endsection