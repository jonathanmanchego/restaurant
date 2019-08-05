@extends('partials.modal_datos')
@section('content-modal')
	{{-- <td><{{$item->id}}</td> --}}
	@foreach ($datos_aux['content'] as $item)
		<tr>
			<td>{{$item->id}}</td>
			<td>{{$item->nombre}}</td>
			<td>{{$item->cantidad}}</td>
			<td>{{$item->precio_compra}}</td>
			<td>
                <button type="button" class="btn btn-success btn-agregarprod" onclick="javascript:addIngrediente({{$item->id}})" >
                    <span class="fa fa-plus"></span>
                </button>
	        </td>
		</tr>
	@endforeach
@endsection