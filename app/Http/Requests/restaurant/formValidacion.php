<?php

namespace restaurant\Http\Requests\restaurant;

use Illuminate\Foundation\Http\FormRequest;

class formValidacion extends FormRequest
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
            'direccion' => 'required|max:100',
            'ruc' => 'required|max:20',
            'telefono1' => 'max:20|nullable',
            'telefono2' => 'max:20|nullable',
            'celular1' => 'max:20|nullable',
            'celular2' => 'max:20|nullable',
        ];
    }
}
