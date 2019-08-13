<?php

namespace restaurant\Http\Requests\general;

use Illuminate\Foundation\Http\FormRequest;

class empleadosValidacion extends FormRequest
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
            'apellido' => 'required',
            'celular' => 'nullable',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
            'username' => 'required|max:44|unique:usuario,username',
            'password' => 'required|min:8|max:16|unique:usuario,password',
            'tipo_documento' => 'required',
            'tipo_empleado' => 'required'
        ];
    }
}
