@extends('layout.sistema')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <ordenes></ordenes>
    </div>
</div>
@endsection

@section('scripts')
  <script src="{{url('/js/jQuery.print.js')}}"></script><!-- tiene que cargar despues del jquery-->
  <script src="{{ url('/js/app.js') }}"></script>
@endsection