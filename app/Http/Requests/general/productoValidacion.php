<?php

namespace restaurant\Http\Requests\general;

use Illuminate\Foundation\Http\FormRequest;

class productoValidacion extends FormRequest
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
            'nombre' => 'required|max:100',
            'descripcion' => 'max:250',
            'imagen' => 'max:100|required',
            'precio' => 'required',
            'codigo' => 'required|max:10',
            'eliminado' => 'nullable',
            'tiempo_espera' => 'required',
            'video' => 'max:100|required'
        ];
    }
}
