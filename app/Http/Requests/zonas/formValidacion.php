<?php

namespace restaurant\Http\Requests\zonas;

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
            'nombre' => 'required|max:100|unique:zonas,nombre,'.$this->route('id')
        ];
    }
}
