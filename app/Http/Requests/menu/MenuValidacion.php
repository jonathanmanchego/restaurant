<?php

namespace restaurant\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use restaurant\Rules\campos\UrlValidacion;

class MenuValidacion extends FormRequest
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
            'nombre' => 'required|max:50|unique:menu,nombre,'. $this->route('id'),
            'url' => ['required','max:100',new UrlValidacion],
            'icono' => 'nullable'
        ];
    }
}
