<?php

namespace restaurant\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use restaurant\Rules\ValidarCampoUrl;

class ValidarMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//para permitir la validacion en este menu
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:50|unique:menu,nombre,' . $this->route('id'),//unique:nombretabla,...campos++
            'url' => ['required','max:100', new ValidarCampoUrl],
            'icono' => 'nullable|max:50',
         
        ];
    }
    /*public function messages()
    {
        return [
            'nombre.required' => 'Ingrese Nombre !',
            'url.required'  => 'Ingrese una Url !',
        ];
    }*/
}
