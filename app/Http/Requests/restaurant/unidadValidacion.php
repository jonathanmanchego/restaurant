<?php

namespace restaurant\Http\Requests\restaurant;

use Illuminate\Foundation\Http\FormRequest;

class unidadValidacion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'string|max:50|required',
            'cantidad' => 'numeric|required',
            'precio_compra' => 'numeric|required'

        ];
    }
}
