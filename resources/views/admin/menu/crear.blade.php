@extends('layout.sistema')
@section('titulo')
	Sistema Menus
@endsection

@section('scripts')
	<script src="{{asset('assets/pages/scripts/admin/menu/crear.js')}}" type="text/javascript"></script>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-lg-12">
			@include('layout.form-error')
			@include('layout.mensaje')
			<div class="box box-danger">
				<div class="box-header with-border">
					<h1 class="box-title">Crear Menús</h1>
				</div>
				<form action="{{route('guardar_menu')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
					@csrf
					<div class="box-body">
						@include('admin.menu.form')
					</div>
					<div class="box-footer">
						<div class="col-sm-5"></div>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-default">Cancelar</button>
                			<button type="submit" class="btn btn-success">Guardar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection