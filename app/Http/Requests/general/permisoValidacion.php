<?php

namespace restaurant\Http\Requests\general;

use Illuminate\Foundation\Http\FormRequest;

class permisoValidacion extends FormRequest
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
            'nombre' => 'required|max:50',
            'slug' => 'required|max:50'
        ];
    }
}
