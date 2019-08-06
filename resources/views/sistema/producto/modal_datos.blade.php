@extends('partials.modal_datos')
@section('content-modal')
	{{-- <td><{{$item->id}}</td> --}}
	@foreach ($datos_aux['content'] as $key => $item)
		<tr id="ingrediente{{$key}}">
			<td>{{$item->id}}</td>
			<td>{{$item->nombre}}</td>
			<td>0</td>
			<td>{{$item->precio_compra}}</td>
			<td>
                <button type="button" class="btn btn-success btn-agregarprod" onclick="javascript:addIngrediente({{$item->id}},{{$key}})" >
                    <span class="fa fa-plus"></span>
                </button>
	        </td>
		</tr>
	@endforeach
@endsection