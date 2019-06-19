<?php

namespace restaurant\Rules;

use Illuminate\Contracts\Validation\Rule;
use restaurant\Models\Admin\Menu;

class ValidarCampoUrl implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value != "#"){
            $menu = Menu::where($attribute, $value)->get();
            return $menu->isEmpty();
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Esta URL ya esta asignada';
    }
}
