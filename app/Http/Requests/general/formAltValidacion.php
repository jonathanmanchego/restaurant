<?php

namespace restaurant\Http\Requests\general;

use Illuminate\Foundation\Http\FormRequest;

class formAltValidacion extends FormRequest
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
            'nombre' => 'required|max:45|unique:tipo_documento,nombre,'.$this->route('id'),
            'descripcion' => 'max:100'
        ];
    }
}
